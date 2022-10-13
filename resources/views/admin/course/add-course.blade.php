@extends('admin.master')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Course Form</h6>
            <hr/>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h5>{{session('message')}}</h5>
            <form action="{{route('new-course')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="teacher_id" value="{{Session::get('TeacherId')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Course Registration</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Course Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="course_name" class="form-control" id="inputEnterYourName" placeholder="Course Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">URL</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" class="form-control" id="inputEnterYourName" placeholder="URL">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Course Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="course_code" class="form-control" id="inputPhoneNo2" placeholder="Course Code">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" name="course_email" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="course_description" id="inputAddress4" rows="3" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="course_image" class="form-control" id="inputEmailAddress2">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

