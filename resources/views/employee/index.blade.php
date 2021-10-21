@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <a href="{{route('createEmployee')}}" class="btn btn-success"><i class="fas fa-plus"> New</i></a>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div class="card mt-2" style="margin-bottom: 20px;">
        <div class="card-header">Employee</div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Age</th>
                    <th scope="col">Place of birth</th>
                    <th scope="cal">Resume</th>
                    <th scope="cal">Photo</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $row)
                <tr>
                    <th>{{$row->Eid}}</th>
                    <td>{{$row->title}}</td>
                    <td>{{$row->name_eng}}</td>
                    <td>{{$row->dob}}</td>
                    <td>{{$row->age}}</td>
                    <td>{{$row->pob}}</td>
                    <td>{{$row->resume_file}}</td>
                    <td><img src="{{asset('employees/photos/'.$row->photo_file)}}" width="100px" height="100px"></td>
                    <td>{{Carbon\Carbon::parse($row->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{url('/employee/edit/'.$row->Eid)}}" class="btn btn-warning"><i class="fas fa-pen"> Edit</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>







@endsection