@extends('frontEnd.master')
@section('content')
    <div class="section margin-top_50 silver_bg" style="margin-top: 106px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full float-right_img">
                        <img src="{{asset($course->course_image)}}" style="width:200px;height:200px;" alt="#" />
                    </div>
                </div>
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2><span>Apply for Admission</span></h2>
                        </div>
                        <div class="full">
                            <h5>Course Name:{{$course->course_name}}</h5>
                            <h5>Teacher Name:{{$course->name}}</h5>
                            <h5>Teacher Phone:{{$course->phone}}</h5>
                            <h5>Teacher Email:{{$course->email}}</h5>
                            <h5>{{$course->course_description}}</h5>
                        </div>
                        <div class="full">
                            @if(Session::get('studentId'))
                                <a class="hvr-radial-out button-theme" data-toggle="modal" data-target="#staticBackdrop">Apply</a>
                            @else
                                <a class="hvr-radial-out button-theme" href="{{route('student-login')}}">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admission')}}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="hidden" name="student_id" value="{{Session::get('studentId')}}">
                        <input type="checkbox" name="confirmation" value="1"> Are you sure apply for this course?
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
