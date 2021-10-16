@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style=" margin-top: 30px;">
            <div class="card" style="bottom: 20px;">
                <div class="card-header">Add New Hiring</div>
                <div class="card-body">
                    <form action="{{route('addEmployee')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-2">
                            <label for="title" class="form-label">Name Title</label>
                            <select class="form-select" name="title" id="title" required>
                                <option></option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Master">Master</option>
                            </select>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="name_eng" class="form-label">Name-Midname-Surname in English</label>
                            <input type="text" class="form-control" name="name_eng" required>
                            @error('name_eng')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="name_thai" class="form-label">Name-Midname-Surname in Thai</label>
                            <input type="text" class="form-control" name="name_thai" required>
                            @error('name_thai')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select class="form-select" name="nationality" required>
                                <option value="">Choose nationality</option>
                                @foreach($data as $row)
                                <option value="{{$row->nation_id}}">{{$row->nation_name}}</option>
                                @endforeach
                            </select>
                            @error('nationality')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input class="form-control" id='date' type="date"  name="dob" required >
                            @error('dob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="pob" class="form-label">Place of Birth (City & Country)</label>
                            <input class="form-control" type="text" name="pob" required>
                            @error('pob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="headcount" class="form-label">Headcount</label>
                            <select class="form-select" name="headcount" required>
                                <option value="">Choose headcount</option>
                                @foreach($headcount as $row)
                                <option value="{{$row->count_id}}">{{$row->count_name}}</option>
                                @endforeach
                            </select>
                            @error('headcount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="cost" class="form-label">Cost Center</label>
                            <input class="form-control" type="text" name="cost" required>
                            @error('cost')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="pos_title" class="form-label">Hiring Position Title</label>
                            <input class="form-control" type="text" name="pos_title" required>
                            @error('pos_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Foreigner's Address</label>
                            <textarea class="form-control" rows="3" name="address" required></textarea>
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="job">Job Description</label>
                            <input type="file" class="form-control" name="job" required accept=".pdf">
                            @error('job_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="organization">Organization Chart</label>
                            <input type="file" class="form-control" name="organization" required accept=".pdf">
                            @error('organization')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="resume">Resume</label>
                            <input type="file" class="form-control" name="resume" required accept=".pdf">
                            @error('resume')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="education">Education Certificate</label>
                            <input type="file" class="form-control" name="education" required accept=".pdf">
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="employment">Employment Certificate</label>
                            <input type="file" class="form-control" name="employment" required accept=".pdf">
                            @error('employment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" required accept=".jpg, .jpeg, .png">
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <!-- <div class="col-md-6">
                            <label for="dependents" class="form-label">Do foreigner has dependents?</label>
                            <select class="form-select">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('dependents')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> -->
                        <div class="d-flex justify-content-start">
                            <a href="{{route('employees')}}" class="btn btn-primary"><i class="fas fa-chevron-left"> Back</i></a>
                            <input class="btn btn-success" type="submit" value="Save" style="margin-left: 10px;">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection