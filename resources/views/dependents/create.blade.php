@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5" style="bottom: 20px;">
                    <div class="card-header">Session 2 Dependent</div>
                    <div class="card-body">
                        <form action="" method="POST" class="row g-3" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="row g-3" id="item_table">
                                <div class="col-md-3">
                                    <label for="relationship" class="form-label">Relationship</label>
                                    <select class="form-select" name="relationship[]" required>
                                        <option value="">Choose relationship</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Son">Son</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Name Title</label>
                                    <select class="form-select" name="title[]" required>
                                        <option value="">Choose name title</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Master">Master</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name-Midname-Surname in English</label>
                                    <input type="text" class="form-control" name="name[]" required>
                                    @error('name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <select class="form-select" name="nationality[]" required>
                                        <option value="">Choose nationality</option>
                                        @foreach ($data as $row)
                                            <option value="{{ $row->nation_id }}">{{ $row->nation_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob[]" min="1900-12-31" max="3000-12-31"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pob" class="form-label">Place of Birth (City & Country)</label>
                                    <input class="form-control" type="text" name="pob[]" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="marriage">Marriage Certificate</label>
                                    <input type="file" class="form-control" name="marriage[]" required accept=".pdf">
                                    @error('marriage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="birth">Birth Certificate</label>
                                    <input type="file" class="form-control" name="birth[]" required accept=".pdf">
                                    @error('birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="passport">Passport</label>
                                    <input type="file" class="form-control" name="passport[]" required accept=".pdf">
                                    @error('passport')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" name="photo[]" required
                                        accept=".jpg, .jpeg, .png">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="other">Other</label>
                                    <input type="file" class="form-control" name="other[]" accept=".pdf">
                                    @error('other')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" class="form-control" name="Eid[]" value="">
                                <div class="col-md-4">
                                    <input type="button" name="add" id="add" class="btn btn-outline-primary btn-sm add"
                                        value="Add Dependent" style="margin-top: 20px;">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.add', function() {
                var html = '';
                html += '<div class="row g-3">';
                html +=
                    '<br><div class="col-md-3"><label for="relationship" class="form-label">Relationship</label><select class="form-select" name="relationship[]" required><option value="">Choose relationship</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Daughter">Daughter</option><option value="Son">Son</option></select></div>';
                html +=
                    '<div class="col-md-3"><label for="title" class="form-label">Name Title</label><select class="form-select" name="title[]" required><option value="">Choose name title</option><option value="Mr">Mr.</option><option value="Mrs">Mrs.</option><option value="Miss">Miss</option><option value="Master">Master</option></select></div>';
                html +=
                    '<div class="col-md-6"><label for="name" class="form-label">Name-Midname-Surname in English</label><input type="text" class="form-control" name="name[]" required>@error('name_eng')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    '<div class="col-md-3"><label for="nationality" class="form-label">Nationality</label><select class="form-select" name="nationality" required><option value="">Choose nationality</option>@foreach ($data as $row)<option value="{{ $row->nation_id }}">{{ $row->nation_name }}</option>@endforeach</select></div>';
                html +=
                    '<div class="col-md-3"><label for="dob" class="form-label">Date of Birth</label><input class="form-control" type="date" name="dob[]" min="1900-12-31" max="3000-12-31" required ></div>';
                html +=
                    '<div class="col-md-6"><label for="pob" class="form-label">Place of Birth (City & Country)</label><input class="form-control" type="text" name="pob[]" required></div>';
                html +=
                    '<div class="col-md-4"><label for="marriage">Marriage Certificate</label><input type="file" class="form-control" name="marriage[]" required accept=".pdf">@error('marriage')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    '<div class="col-md-4"><label for="birth">Birth Certificate</label><input type="file" class="form-control" name="birth[]" required accept=".pdf">@error('birth')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    ' <div class="col-md-4"><label for="passport">Passport</label><input type="file" class="form-control" name="passport[]" required accept=".pdf">@error('passport')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    '<div class="col-md-4"><label for="photo">Photo</label><input type="file" class="form-control" name="photo[]" required accept=".jpg, .jpeg, .png">@error('photo')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    '<div class="col-md-4"><label for="other">Other</label><input type="file" class="form-control" name="other[]" accept=".pdf">@error('other')<span class="text-danger">{{ $message }}</span>@enderror</div>';
                html +=
                    '<input type="hidden" class="form-control" name="Eid[]" value="">';
                html +=
                    '<input type="button" name="remove" class="btn btn-outline-danger btn-sm remove" value="Delete"></div>';
                $('#item_table').append(html);
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('div').remove();
            });

        });
    </script>




@endsection
