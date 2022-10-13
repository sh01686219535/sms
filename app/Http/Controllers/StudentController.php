<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public $student,$image,$imageName,$directory,$imageUrl,$exPassword,$studentInfo,$admission;
    public function studentRegister(){
        return view('frontEnd.student.student-register');
    }
    public function studentLogin(){
        return view('frontEnd.student.student-login');
    }
    public function saveStudent(Request $request){
        $this->student=new Student();
        $this->student->student_name=$request->student_name;
        $this->student->student_email=$request->student_email;
        $this->student->student_phone=$request->student_phone;
        $this->student->student_password=bcrypt($request->student_password);
       if ($request->file('student_image')){
           $this->student->student_image=$this->saveImage($request);
       }
        $this->student->address=$request->address;
        $this->student->save();
        return back();
    }
    private function saveImage($request){
        $this->image=$request->file('student_image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='adminAsset/student-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function studentLoginCheck(Request $request){
        $this->studentInfo=Student::where('student_email',$request->user_name)
            ->orwhere('student_phone',$request->user_name)
            ->first();
        if ($this->studentInfo){
            $this->exPassword=$this->studentInfo->student_password;
            if (password_verify($request->password,$this->exPassword)){
                Session::put('studentId',$this->studentInfo->id);
                Session::put('studentName',$this->studentInfo->student_name);
                return redirect('/');
            }else{
                return back()->with('message','Please use valid password');
            }
        }else{
            return back()->with('message','Please use valid email or phone');
        }
    }
    public function studentLogout(){
        Session::forget('studentId');
        Session::forget('studentName');
        return redirect('/');
    }
    public function studentProfile(){
        return view('frontEnd.student.student-profile');
    }
    public function admission(Request $request){
        $this->admission=new Admission();
        $this->admission->course_id=$request->course_id;
        $this->admission->student_id=$request->student_id;
        $this->admission->confirmation=$request->confirmation;
        $this->admission->save();
        return back();
    }
}
