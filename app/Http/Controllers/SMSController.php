<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;

class SMSController extends Controller
{
    public $courseInfo;
    public function index(){
        return view('frontEnd.home.home',[
            'courses'=>Course::where('status',1)
                ->orderby('id','desc')
                ->take(3)
                ->get()
        ]);
    }
    public function about(){
        return view('frontEnd.about.about');
    }
    public function course(){
        return view('frontEnd.course.course');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
    public function courseDetails($slug){
        $this->courseInfo=DB::table('courses')
            ->join('teachers','courses.teacher_id','teachers.id')
            ->select('courses.*','teachers.name','teachers.email','teachers.phone')
            ->where('slug',$slug)
            ->first();
        return view('frontEnd.course.course-details',[
            'course'=>$this->courseInfo
        ]);
    }
}
