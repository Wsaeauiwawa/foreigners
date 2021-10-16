@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Foreigner Visa and Work Permit System</h2>
            <a href="{{route('createEmployee')}}" class="btn btn-success"><i class="fas fa-plus"> New</i></a>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div class="card mt-2">
        <div class="card-header">Employee</div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Age</th>
                    <th scope="col">Place of birth</th>
                    <th scope="cal">Resume</th>
                    <th scope="col">Submit date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $row)
                <tr>
                    <th>{{$row->Eid}}</th>
                    <td>{{$row->name_eng}}</td>
                    <td>{{$row->dob}}</td>
                    <td>{{$row->age}}</td>
                    <td>{{$row->pob}}</td>
                    <td>{{$row->resume_file}}</td>
                    <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                    <td>
                        <a href="{{url('/employee/edit/'.$row->Eid)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a href="{{url('/employee/delete/'.$row->Eid)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>







@endsection