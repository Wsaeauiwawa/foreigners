@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Foreigner Visa and Work Permit System</h2>
            <a href="{{route('createDependent')}}" class="btn btn-success"><i class="fas fa-plus"> New</i></a>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div class="card mt-2">
        <div class="card-header">Dependent</div>
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
               
            </tbody>
        </table>
    </div>

</div>







@endsection