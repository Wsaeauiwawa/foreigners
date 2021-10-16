@extends('layouts.layout')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session("success"))
                <div class="alert alert-success mt-2">{{session('success')}}</div>
                @endif
                <div class="card mt-2">
                    <div class="card-header">Headcount</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Headcount</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($headcount as $row)
                            <tr>
                                <th>{{$row->count_id}}</th>
                                <th>{{$row->count_name}}</th>
                                <td>
                                        <a href="{{url('/headcount/edit/'.$row->count_id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <a href="{{url('/headcount/delete/'.$row->count_id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-header">Headcount</div>
                    <div class="card-body">
                        <form action="{{route('addHeadcount')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="count_name">Headcount</label>
                                <input type="text" class="form-control" name="count_name">
                            </div>
                            @error('count_name')
                            <div class="my-2">
                                <span class="text-danger my-2">{{$message}}</span>
                            </div>
                            @enderror
                            <br>
                            <input type="submit" value="Save" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection