<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    public $course,$str,$image,$imageName,$directory,$imageUrl,$applicants;
    public function addCourse(){
        return view('admin.course.add-course');
    }
    public function manageCourse(){
        $this->course=DB::table('courses')
            ->join('teachers','courses.teacher_id','teachers.id')
            ->select('courses.*','teachers.name')
            ->get();
        return view('admin.course.manage-course',[
            'courses'=>$this->course
        ]);
    }
    public function saveCourse(Request $request){
        $this->validate($request,[
            'course_name'=>'required|unique:courses,course_name|string|min:10|max:100',
            'course_code'=>'required|unique:courses,course_name|min:4|max:20',
            'course_email'=>'required|unique:courses,course_email|email',
            'course_image'=>'required|unique:courses,course_name|mimes:jpg,bmp,png'
        ]);
        $this->course=new Course();
        $this->course->teacher_id=$request->teacher_id;
        $this->course->course_name=$request->course_name;
        $this->course->slug=$this->makeSlug($request);
        $this->course->course_code=$request->course_code;
        $this->course->course_email=$request->course_email;
        $this->course->course_description=$request->course_description;
       if ($request->file('course_image')){
           $this->course->course_image=$this->saveImage($request);
       }
        $this->course->save();
        return back()->with('message','Course save Successfully');
    }
    public function makeSlug($request){
        if ($request->slug){
            $this->str=$request->slug;
            return preg_replace('/\s+/u','-',trim($this->str));
        }
        $this->str=$request->course_name;
        return preg_replace('/\s+/u','-',trim($this->str));
    }
    private function saveImage($request){
        $this->image=$request->file('course_image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='adminAsset/course-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function deleteCourse(Request $request){
        $this->course=Course::find($request->teacher_id);
        if ($this->course->course_image){
            unlink($this->course->course_image);
        }
        $this->course->delete();
        return redirect('/manage-course');
    }
    public function editCourse($id){
        return view('admin.course.edit-course',[
            'course'=>Course::find($id)
        ]);
    }
    public function updateCourse(Request $request){
        $this->course=Course::find($request->course_id);
        $this->course=new Course();
        $this->course->teacher_id=$request->teacher_id;
        $this->course->course_name=$request->course_name;
        $this->course->slug=$this->makeSlug($request);
        $this->course->course_code=$request->course_code;
        $this->course->course_email=$request->course_email;
        $this->course->course_description=$request->course_description;
        if ($request->file('course_image')){
            $this->course->course_image=$this->saveImage($request);
        }
        $this->course->save();
        return redirect('/manage-course');
    }
    public function manageApplicant(){
        $this->applicants=DB::table('admissions')
            ->join('students','admissions.student_id','students.id')
            ->join('courses','admissions.course_id','courses.id')
            ->select('students.student_name','students.student_email','students.student_phone','courses.course_name','courses.course_code','courses.teacher_id','admissions.id','admissions.confirmation')
            ->get();
        return view('admin.teacher.manage-applicant',[
            'applicants'=>$this->applicants
        ]);

    }
}
