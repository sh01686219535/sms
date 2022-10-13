@extends('admin.master')
@section('title')
    Manage Teacher
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1 @endphp
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->address}}</td>
                        <td>
                            <img src="{{asset($teacher->image)}}" alt="img" style="width:50px;height:50px;">
                        </td>
                        <td>
                            <a href="{{route('edit-teacher',['id'=>$teacher->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                            <form action="{{route('delete-teacher')}}" method="post">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                <input type="submit" value="Delete" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure Delete this')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
