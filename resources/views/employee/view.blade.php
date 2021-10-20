@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12" style=" margin-top: 30px;">
        <div class="card" style="bottom: 20px;">
            <div class="card-header">Employee</div>
            <div class="card-body">
                <form action="{{url('/employee/update/'.$employees->Eid)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-2">
                        <label for="title" class="form-label">Name Title</label>
                        <select class="form-select" name="title" id="title" disabled>
                            <option value="">Choose name title</option>
                            <option value="Mr" @if ($employees->title == "Mr") {{ 'selected' }} @endif>Mr.</option>
                            <option value="Mrs" @if ($employees->title == "Mrs") {{ 'selected' }} @endif>Mrs.</option>
                            <option value="Miss" @if ($employees->title == "Miss") {{ 'selected' }} @endif>Miss</option>
                            <option value="Master" @if ($employees->title == "Master") {{ 'selected' }} @endif>Master</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="name_eng" class="form-label">Name-Midname-Surname in English</label>
                        <input type="text" class="form-control" name="name_eng" value="{{$employees->name_eng}}" readonly>
                    </div>

                    <div class="col-md-5">
                        <label for="name_thai" class="form-label">Name-Midname-Surname in Thai</label>
                        <input type="text" class="form-control" name="name_thai" value="{{$employees->name_thai}}" readonly>
                    </div>

                    <div class="col-md-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <select class="form-select" name="nationality" disabled>
                            <option value="">Choose nationality</option>
                            @foreach($data as $row)
                            <option value="{{$row->nation_id}}" {{$employees->nationality == $row->nation_id ? 'selected':''}}>{{$row->nation_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input class="form-control" id='date' type="date" name="dob"  value="{{$employees->dob}}" readonly>
                    </div>
                    <div class="col-md-5">
                        <label for="pob" class="form-label">Place of Birth (City & Country)</label>
                        <input class="form-control" type="text" name="pob" value="{{$employees->pob}}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="headcount" class="form-label">Headcount</label>
                        <select class="form-select" name="headcount" disabled>
                            <option value="">Choose headcount</option>
                            @foreach($headcount as $row)
                            <option value="{{$row->count_id}}" {{$employees->headcount == $row->count_id ? 'selected':''}}>{{$row->count_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cost" class="form-label">Cost Center</label>
                        <input class="form-control" type="text" name="cost" value="{{$employees->cost}}" readonly>
                    </div>
                    
                    <div class="col-md-5">
                        <label for="pos_title" class="form-label">Hiring Position Title</label>
                        <input class="form-control" type="text" name="pos_title" value="{{$employees->pos_title}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Foreigner's Address</label>
                        <textarea class="form-control" rows="3" name="address" readonly>{{$employees->address}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="job">Job Description</label>
                        <br>
                        <a href="{{asset('employees/job_description/'.$employees->job_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->job_file}}</i></a>
                    </div>
                    <div class="col-md-4">
                        <label for="organization">Organization Chart</label>
                        <br>
                        <a href="{{asset('employees/organization_chart/'.$employees->organization_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->organization_file}}</i></a>
                    </div>
                    <div class="col-md-4">
                        <label for="resume">Resume</label>
                        <br>
                        <a href="{{asset('employees/resume/'.$employees->resume_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->resume_file}}</i></a>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="education">Education Certificate</label>
                        <br>
                        <a href="{{asset('employees/education_certificate/'.$employees->education_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->education_file}}</i></a> 
                    </div>

                    <div class="col-md-4">
                        <label for="employment">Employment Certificate</label>
                        <br>
                        <a href="{{asset('employees/employment_certificate/'.$employees->employment_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->employment_file}}</i></a>  
                    </div>

                    <div class="col-md-4">
                        <label for="other">Other</label>
                        <br>
                        <a href="{{asset('employees/other/'.$employees->other_file)}}" target="_blank"><i class="far fa-file-pdf"> {{$employees->other_file}}</i></a>
                    </div>
                    <div class="col-md-4">
                        <label for="photo">Photo</label>
                        <br>
                        <input type="hidden" name="old_image" value="{{$employees->photo}}">
                        <div class="form-group">
                            <img src="{{asset('employees/photos/'.$employees->photo_file)}}"  width="300px" height="300px">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-start">
                        <a href="{{route('employees')}}" class="btn btn-primary mt-2"><i class="fas fa-chevron-left"> Back</i></a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection