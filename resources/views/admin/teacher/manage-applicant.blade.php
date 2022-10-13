@extends('admin.master')
@section('title')
    Manage Applicant
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Student Name</th>
                        <th>Student Phone</th>
                        <th>Student Email</th>
                        <th>CourSe Name</th>
                        <th>Course Code</th>
                        <th>Confirmation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($applicants as $applicant)
                        @if($applicant->teacher_id == Session::get('TeacherId'))
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$applicant->student_name}}</td>
                            <td>{{$applicant->student_phone}}</td>
                            <td>{{$applicant->student_email}}</td>
                            <td>{{$applicant->course_name}}</td>
                            <td>{{$applicant->course_code}}</td>
                            <td>{{$applicant->confirmation}}</td>
                            <td>
                                <a href="{{route('edit-teacher',['id'=>$applicant->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                                <form action="{{route('delete-teacher')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="teacher_id" value="{{$applicant->id}}">
                                    <input type="submit" value="Delete" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure Delete this')">
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
