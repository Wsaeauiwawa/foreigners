@extends('layouts.layout')

@section('content')
<div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-2">
                        <div class="card-header">Edit Headcount</div>
                        <div class="card-body">
                            <form action="{{url('/headcount/update/'.$headcount->count_id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="count_name">Headcount</label>
                                    <input type="text" class="form-control" name="count_name" value="{{$headcount->count_name}}">
                                </div>
                                @error('count_name')
                                <div class="my-2">
                                    <span class="text-danger my-2">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>







@endsection