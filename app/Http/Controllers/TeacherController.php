<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;

class TeacherController extends Controller
{
    public $teacher,$image,$imageName,$directory,$imageUrl,$teacherInfo,$exPassword;
    public function addTeacher(){
        return view('admin.teacher.add-teacher');
    }
    public function manageTeacher(){
        return view('admin.teacher.manage-teacher',[
            'teachers'=>Teacher::all()
        ]);
    }
    public function saveTeacher(Request $request){
        $this->teacher=new Teacher();
        $this->teacher->name=$request->name;
        $this->teacher->phone=$request->phone;
        $this->teacher->email=$request->email;
        $this->teacher->password=bcrypt(12345678);
        $this->teacher->address=$request->address;
        if ($request->file('image')){
            $this->teacher->image=$this->saveImage($request);
        }
        $this->teacher->save();
        return back()->with('message','Teacher save Successfully');
    }
    private function saveImage($request){
        $this->image=$request->file('image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='adminAsset/teacher-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function deleteTeacher(Request $request){
        $this->teacher=Teacher::find($request->teacher_id);
        if ($this->teacher->image){
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return back();
    }
    public function editTeacher($id){
        return view('admin.teacher.edit-teacher',[
            'teacher'=>Teacher::find($id)
        ]);
    }
    public function updateTeacher(Request $request){
        $this->teacher=Teacher::find($request->teacher_id);
        $this->teacher->name=$request->name;
        $this->teacher->phone=$request->phone;
        $this->teacher->email=$request->email;
        $this->teacher->password=bcrypt(12345678);
        $this->teacher->address=$request->address;
        if ($request->file('image')){
            $this->teacher->image=$this->saveImage($request);
        }
        $this->teacher->save();
        return redirect('/manage-teacher');
    }
    public function teacherLogin(){
        return view('admin.teacher.login');
    }
    public function teacherLoginForm(Request $request){
        $this->teacherInfo=Teacher::where('email',$request->user_name)
            ->orwhere('phone',$request->user_name)
            ->first();
        if($this->teacherInfo){
            $this->exPassword=$this->teacherInfo->password;
            if (password_verify($request->password,$this->exPassword)){
                Session::put('TeacherId',$this->teacherInfo->id);
                Session::put('TeacherName',$this->teacherInfo->name);
                return redirect('/');
            }else{
                return back()->with('message','Please use valid password');
            }
        }else{
            return back()->with('message','Please use valid Email or phone');
        }
    }
    public function teacherLogout(){
        Session::forget('TeacherId');
        Session::forget('TeacherName');
        return redirect('/');
    }
    public function teacherProfile(){
        return view('admin.teacher.profile');
    }
}

