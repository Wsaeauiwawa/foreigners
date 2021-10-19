@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style=" margin-top: 30px;">
            <div class="card" style="bottom: 20px;">
                <div class="card-header">Session 2 Dependent</div>
                <div class="card-body">
                    <form action="" method="POST" class="row g-3" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="col-md-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <select class="form-select" name="relationshipt"required>
                                <option value="">Choose relationship</option>
                                <option value="Husband">Husband</option>
                                <option value="Wife">Wife</option>
                                <option value="Daughter">Daughter</option>
                                <option value="Son">Son</option>
                            </select>
                            {{-- @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        <div class="col-md-3">
                            <label for="title" class="form-label">Name Title</label>
                            <select class="form-select" name="title" id="title" required>
                                <option value="">Choose name title</option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Master">Master</option>
                            </select>
                            {{-- @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>

                        <div class="col-md-6">
                            <label for="name_eng" class="form-label">Name-Midname-Surname in English</label>
                            <input type="text" class="form-control" name="name_eng" required>
                            {{-- @error('name_eng')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>


                        <div class="col-md-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select class="form-select" name="nationality" required>
                                <option value="">Choose nationality</option>
                                @foreach($data as $row)
                                <option value="{{$row->nation_id}}">{{$row->nation_name}}</option>
                                @endforeach
                            </select>
                            {{-- @error('nationality')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        <div class="col-md-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input class="form-control" id='date' type="date" name="dob" min="1900-12-31" max="3000-12-31" required >
                            {{-- @error('dob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        <div class="col-md-6">
                            <label for="pob" class="form-label">Place of Birth (City & Country)</label>
                            <input class="form-control" type="text" name="pob" required>
                            {{-- @error('pob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                       
                        <div class="col-md-4">
                            <label for="marriage">Marriage Certificate</label>
                            <input type="file" class="form-control" name="marriage" required accept=".pdf">
                            {{-- @error('job_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        <div class="col-md-4">
                            <label for="birth">Birth Certificate</label>
                            <input type="file" class="form-control" name="birth" required accept=".pdf">
                            {{-- @error('organization')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        <div class="col-md-4">
                            <label for="passport">Passport</label>
                            <input type="file" class="form-control" name="passport" required accept=".pdf">
                            {{-- @error('resume')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>

                        <div class="col-md-4">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" required accept=".jpg, .jpeg, .png">
                            {{-- @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>

                        <div class="col-md-4">
                            <label for="other">Other</label>
                            <input type="file" class="form-control" name="other" required accept=".jpg, .jpeg, .png, .pdf">
                            {{-- @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                        
                        <div class="d-flex justify-content-start">
                            <a href="{{route('dependents')}}" class="btn btn-primary"><i class="fas fa-chevron-left"> Back</i></a>
                            <input class="btn btn-success" type="submit" value="Save" style="margin-left: 10px;">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection