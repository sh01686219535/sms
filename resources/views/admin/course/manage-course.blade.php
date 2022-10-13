@extends('admin.master')
@section('title')
    Manage Course
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Teacher Name</th>
                        <th>Course Name</th>
                        <th>course Code</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($courses as $course)
                        @if($course->teacher_id ==  Session::get('TeacherId'))
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->course_code}}</td>
                            <td>{{$course->course_email}}</td>
                            <td>{{$course->course_description}}</td>
                            <td>
                                <img src="{{asset($course->course_image)}}" alt="img" style="width:50px;height:50px;">
                            </td>
                            <td>
                                <a href="{{route('edit-course',['id'=>$course->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                                <form action="{{route('delete-course')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="teacher_id" value="{{$course->id}}">
                                    <input type="submit" value="Delete" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure Delete this')">
                                </form>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

