@extends('frontEnd.master')
@section('title')
    Student Register
@endsection
@section('content')
    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>Student Registration</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section contact_section" style="background:#12385b;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="full float-right_img">
                        <img src="http://localhost:8020/server-1/sms_project/public/frontEndAsset/images/img10.png" alt="#">
                    </div>
                </div>
                <div class="layout_padding col-lg-6 col-md-6 col-sm-12">
                    <div class="contact_form">
                        <form action="{{route('student-register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="full field">
                                    <input type="text" placeholder="Your Name" name="student_name"/>
                                </div>
                                <div class="full field">
                                    <input type="email" placeholder="Email Address" name="student_email"/>
                                </div>
                                <div class="full field">
                                    <input type="text" placeholder="Phone Number" name="student_phone"/>
                                </div>
                                <div class="full field">
                                    <input type="password" placeholder="Your password" name="student_password"/>
                                </div>
                                <div class="full field">
                                    <input type="file" name="student_image"/>
                                </div>
                                <div class="full field">
                                    <textarea placeholder="address" name="address"></textarea>
                                </div>
                                <div class="full field">
                                    <div class="center"><button type="submit">Register</button></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
