@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style=" margin-top: 30px;">
            <div class="card" style="bottom: 20px;">
                <div class="card-header">Edit New Hiring</div>
                <div class="card-body">
                    <form action="{{url('/employee/update/'.$employees->Eid)}}" method="POST" class="row g-3" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="col-md-2">
                            <label for="title" class="form-label">Name Title</label>
                            <select class="form-select" name="title" id="title" required>
                                <option value="">Choose name title</option>
                                <option value="Mr" @if ($employees->title == "Mr") {{ 'selected' }} @endif>Mr.</option>
                                <option value="Mrs" @if ($employees->title == "Mrs") {{ 'selected' }} @endif>Mrs.</option>
                                <option value="Miss" @if ($employees->title == "Miss") {{ 'selected' }} @endif>Miss</option>
                                <option value="Master" @if ($employees->title == "Master") {{ 'selected' }} @endif>Master</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="name_eng" class="form-label">Name-Midname-Surname in English</label>
                            <input type="text" class="form-control" name="name_eng" value="{{$employees->name_eng}}" required>
                            @error('name_eng')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="name_thai" class="form-label">Name-Midname-Surname in Thai</label>
                            <input type="text" class="form-control" name="name_thai" value="{{$employees->name_thai}}" required>
                            @error('name_thai')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select class="form-select" name="nationality" required>
                                <option value="">Choose nationality</option>
                                @foreach($data as $row)
                                <option value="{{$row->nation_id}}" {{$employees->nationality == $row->nation_id ? 'selected':''}}>{{$row->nation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input class="form-control" id='date' type="date" name="dob"  value="{{$employees->dob}}" required>
                            @error('dob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="pob" class="form-label">Place of Birth (City & Country)</label>
                            <input class="form-control" type="text" name="pob" value="{{$employees->pob}}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="headcount" class="form-label">Headcount</label>
                            <select class="form-select" name="headcount" required>
                                <option value="">Choose headcount</option>
                                @foreach($headcount as $row)
                                <option value="{{$row->count_id}}" {{$employees->headcount == $row->count_id ? 'selected':''}}>{{$row->count_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="cost" class="form-label">Cost Center</label>
                            <input class="form-control" type="text" name="cost" value="{{$employees->cost}}" required>
                        </div>
                        <div class="col-md-5">
                            <label for="pos_title" class="form-label">Hiring Position Title</label>
                            <input class="form-control" type="text" name="pos_title" value="{{$employees->pos_title}}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Foreigner's Address</label>
                            <textarea class="form-control" rows="3" name="address" required>{{$employees->address}}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="job">Job Description</label>
                            <input type="file" class="form-control" name="job" value="{{$employees->job}}" accept=".pdf">
                            <a href="{{asset('employees/job_description/'.$employees->job_file)}}" target="_blank">{{$employees->job_file}}</a>
                            @error('job')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="organization">Organization Chart</label>
                            <input type="file" class="form-control" name="organization" value="{{$employees->organization}}" accept=".pdf">
                            <a href="{{asset('employees/organization_chart/'.$employees->organization_file)}}" target="_blank">{{$employees->organization_file}}</a>
                            @error('organization')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="resume">Resume</label>
                            <input type="file" class="form-control" name="resume" value="{{$employees->resume}}" accept=".pdf">
                            <a href="{{asset('employees/resume/'.$employees->resume_file)}}" target="_blank">{{$employees->resume_file}}</a>
                            @error('resume')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="education">Education Certificate</label>
                            <input type="file" class="form-control" name="education" value="{{$employees->education}}" accept=".pdf">
                            <a href="{{asset('employees/education_certificate/'.$employees->education_file)}}" target="_blank">{{$employees->education_file}}</a> 
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="employment">Employment Certificate</label>
                            <input type="file" class="form-control" name="employment" value="{{$employees->employment}}" accept=".pdf">
                            <a href="{{asset('employees/employment_certificate/'.$employees->employment_file)}}" target="_blank">{{$employees->employment_file}}</a>  
                            @error('employment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="other">Other</label>
                            <input type="file" class="form-control" name="other" value="{{$employees->other}}" accept=".pdf">
                            <a href="{{asset('employees/other/'.$employees->other_file)}}" target="_blank">{{$employees->other_file}}</a>
                            @error('other')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" value="{{$employees->photo}}" accept=".jpg, .jpeg, .png">
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <br>
                            <input type="hidden" name="old_image" value="{{$employees->photo_file}}">
                            <div class="form-group">
                                <img src="{{asset('employees/photos/'.$employees->photo_file)}}"  width="200px" height="200px">
                            </div>
                        </div>

                        <div class="d-flex justify-content-start">
                            <a href="{{route('employees')}}" class="btn btn-primary mt-2"><i class="fas fa-chevron-left"> Back</i></a>
                            <input class="btn btn-success mt-2" type="submit" value="Update" style="margin-left: 10px;">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection