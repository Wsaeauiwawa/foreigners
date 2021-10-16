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
                    <div class="card-header">Nationalities</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nationality as $row)
                            <tr>
                                <th>{{$row->nation_id}}</th>
                                <td>{{$row->nation_name}}</td>
                                <td>
                                    <a href="{{url('/nationality/edit/'.$row->nation_id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="{{url('/nationality/delete/'.$row->nation_id)}}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$nationality->links()}}
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-header">Nationality</div>
                    <div class="card-body">
                        <form action="{{route('addNationality')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nation_name">Nationality</label>
                                <input type="text" class="form-control" name="nation_name">
                            </div>
                            @error('nation_name')
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