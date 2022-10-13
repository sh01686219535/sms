@extends('frontEnd.master')
@section('title')
    Student Login
@endsection
@section('content')
    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>Student Login</span></h2>
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

                        <form action="{{route('student-login')}}" method="post" enctype="multipart/form-data">
                            <h5 class="text-danger text-center">{{session('message')}}</h5>
                            @csrf
                            <fieldset>
                                <div class="full field">
                                    <input type="text" placeholder="Your email or phone" name="user_name"/>
                                </div>
                                <div class="full field">
                                    <input type="password" placeholder="Your password" name="password"/>
                                </div>
                                <div class="full field">
                                    <div class="center"><button type="submit">Login</button></div>
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

