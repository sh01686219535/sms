@extends('admin.master')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Course Edit Form</h6>
            <hr/>
            <h5>{{session('message')}}</h5>
            <form action="{{route('update-course')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="teacher_id" value="{{Session::get('TeacherId')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Course Edit from</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Course Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="course_name" value="{{$course->course_name}}" class="form-control" id="inputEnterYourName" placeholder="Course Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">URL</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" value="{{$course->slug}}"class="form-control" id="inputEnterYourName" placeholder="URL">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Course Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="course_code" value="{{$course->course_code}}"class="form-control" id="inputPhoneNo2" placeholder="Course Code">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" name="course_email" value="{{$course->course_email}}"class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="course_description" id="inputAddress4" rows="3" placeholder="Description">{{$course->course_description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="course_image" class="form-control" id="inputEmailAddress2">
                                    <img src="{{asset($course->course_image)}}"style="width:50px;height:50px;" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Course Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


