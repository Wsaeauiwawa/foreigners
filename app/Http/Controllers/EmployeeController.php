<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Headcount;
use App\Models\Nationality;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Storage;
use PDO;

class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::paginate(25);
        return view('employee.index', compact('employees'));
    }
    public function create()
    {

        $data = Nationality::all();
        $headcount = Headcount::all();
        return view('employee.create', ['data' => $data], ['headcount' => $headcount]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name_eng' => 'unique:employees',
                'name_thai' => 'unique:employees',
                'cost' => 'unique:employees',
                'job' => 'max:10240',
                'organization' => 'max:10240',
                'resume' => 'max:10240',
                'education' => 'max:10240',
                'employment' => 'max:10240',
                'photo' => 'max:10240'
            ],
            [
                'name_eng.unique' => "The Name-Midname-Surname in English has already been taken.",
                'name_thai.unique' => "The Name-Midname-Surname in Thai has already been taken.",
                'cost.unique' => "The cost center has already been taken.",
                'job.max' => "The job desctiption file must not be greater than 10 MB.",
                'organization.max' => "The organization chart file must not be greater than 10 MB.",
                'resume.max' => "The resume file must not be greater than 10 MB.",
                'education.max' => "The education certificate file must not be greater than 10 MB.",
                'employment.max' => "The employment certification must not be greater than 10 MB.",
                'photo.max' => "The photo must not be greater than 10 MB.",
            ]
        );
        $job_file = $request->file('job');
        $job_name = time() . '_' . $job_file->getClientOriginalName();
        $job_path = $job_file->storeAs('file/employees/job_description', $job_name);
        //dd($job_name);

        $organization_file = $request->file('organization');
        $organization_name = time() . '_' . $organization_file->getClientOriginalName();
        $organization_path = $organization_file->storeAs('file/employees/organization_chart', $organization_name);
        //dd($organization_path);

        $resume_file = $request->file('resume');
        $resume_name = time() . '_' . $resume_file->getClientOriginalName();
        $resume_path = $resume_file->storeAs('file/employees/resume', $resume_name);
        //dd($resume_path);

        $education_file = $request->file('education');
        $education_name = time() . '_' . $education_file->getClientOriginalName();
        $education_path = $education_file->storeAs('file/employees/education_certificate', $education_name);
        //dd($education_path);

        $employment_file = $request->file('employment');
        $employment_name = time() . '_' . $employment_file->getClientOriginalName();
        $employment_path = $employment_file->storeAs('file/employees/employment_certificate', $employment_name);
        //dd($employment_path);

        $photo = $request->file('photo');   //encryption
        $name_gen = time() . '_' . $photo->getClientOriginalName();   //Generate name
        $upload_location = 'employees/photos/'; //location
        $photo_path = $upload_location . $name_gen;    //path
        $photo->move($upload_location, $name_gen);

        $dob = $request->dob;
        $age = Carbon::parse($dob)->age;

        Employee::create([
            'title' => $request->title,
            'name_eng' => $request->name_eng,
            'name_thai' => $request->name_thai,
            'nationality' => $request->nationality,
            'dob' => $dob,
            'age' => $age,
            'pob' => $request->pob,
            'headcount' => $request->headcount,
            'cost' => $request->cost,
            'pos_title' => $request->pos_title,
            'address' => $request->address,
            'job_file' => $job_name,
            'job_path' => $job_path,
            'organization_file' => $organization_name,
            'organization_path' => $organization_path,
            'resume_file' => $resume_name,
            'resume_path' => $resume_path,
            'education_file' => $education_name,
            'education_path' => $education_path,
            'employment_file' => $employment_name,
            'employment_path' => $employment_path,
            'photo' => $photo_path
        ]);

        return redirect()->route('employees')->with('success', 'Created Successfully');
    }

    public function edit($Eid)
    {
        $employees = Employee::find($Eid);
        $data = Nationality::all();
        $headcount = Headcount::all();
        return view('employee.edit', compact('data', 'headcount', 'employees'));
    }

    public function update(Request $request, $Eid)
    {
        $request->validate(
            [
                'job' => 'max:10240',
                'organization' => 'max:10240',
                'resume' => 'max:10240',
                'education' => 'max:10240',
                'employment' => 'max:10240',
                'photo' =>'max:10240'
            ],
            [
                'job.max' => "The job desctiption file must not be greater than 10 MB.",
                'organization.max' => "The organization chart file must not be greater than 10 MB.",
                'resume.max' => "The resume file must not be greater than 10 MB.",
                'education.max' => "The education certificate file must not be greater than 10 MB.",
                'employment.max' => "The employment certification must not be greater than 10 MB.",
                'photo.max' => "The photo must not be greater than 10 MB.",
            ]
        );

        $job_file = $request->file('job');
        $organization_file = $request->file('organization');
        $resume_file = $request->file('resume');
        $education_file = $request->file('education');
        $employment_file = $request->file('employment');
        $photo = $request->file('photo');

        if ($job_file && $organization_file && $resume_file && $education_file && $employment_file && $photo) {

            $job = Employee::find($Eid)->job_file;
            unlink(storage_path('app/file/employees/job_description/' . $job));
            $job_name = time() . '_' . $job_file->getClientOriginalName();
            $job_path = $job_file->storeAs('file/employees/job_description', $job_name);

            $organization = Employee::find($Eid)->organization_file;
            unlink(storage_path('app/file/employees/organization_chart/' . $organization));
            $organization_name = time() . '_' . $organization_file->getClientOriginalName();
            $organization_path = $organization_file->storeAs('file/employees/organization_chart', $organization_name);

            $resume = Employee::find($Eid)->resume_file;
            unlink(storage_path('app/file/employees/resume/' . $resume));
            $resume_name = time() . '_' . $resume_file->getClientOriginalName();
            $resume_path = $resume_file->storeAs('file/employees/resume', $resume_name);

            $education = Employee::find($Eid)->education_file;
            unlink(storage_path('app/file/employees/education_certificate/' . $education));
            $education_name = time() . '_' . $education_file->getClientOriginalName();
            $education_path = $education_file->storeAs('file/employees/education_certificate', $education_name);


            $employment = Employee::find($Eid)->employment_file;
            unlink(storage_path('app/file/employees/employment_certificate/' . $employment));
            $employment_name = time() . '_' . $employment_file->getClientOriginalName();
            $employment_path = $employment_file->storeAs('file/employees/employment_certificate', $employment_name);

            $name_gen = time() . '_' . $photo->getClientOriginalName();   //Generate name
            $upload_location = 'employees/photos/'; //location
            $photo_path = $upload_location . $name_gen;    //path
            $photo->move($upload_location, $name_gen);
            //dd($photo);

            $dob = $request->dob;
            $age = Carbon::parse($dob)->age;

            Employee::find($Eid)->update([
                'title' => $request->title,
                'name_eng' => $request->name_eng,
                'name_thai' => $request->name_thai,
                'nationality' => $request->nationality,
                'dob' => $dob,
                'age' => $age,
                'pob' => $request->pob,
                'headcount' => $request->headcount,
                'cost' => $request->cost,
                'pos_title' => $request->pos_title,
                'address' => $request->address,
                'job_file' => $job_name,
                'job_path' => $job_path,
                'organization_file' => $organization_name,
                'organization_path' => $organization_path,
                'resume_file' => $resume_name,
                'resume_path' => $resume_path,
                'education_file' => $education_name,
                'education_path' => $education_path,
                'employment_file' => $employment_name,
                'employment_path' => $employment_path,
                'photo' => $photo_path
            ]);

            $old_image = $request->old_image;
            unlink($old_image);
            $photo->move($upload_location, $name_gen);
            return redirect()->route('employees')->with('success', "Updated  all attrachments successfully");
        } elseif ($job_file){
            $job = Employee::find($Eid)->job_file;
            unlink(storage_path('app/file/employees/job_description/' . $job));
            $job_name = time() . '_' . $job_file->getClientOriginalName();
            $job_path = $job_file->storeAs('file/employees/job_description', $job_name);


        }
        
        /*else {

            $dob = $request->dob;
            $age = Carbon::parse($dob)->age;

            Employee::find($Eid)->update([
                'title' => $request->title,
                'name_eng' => $request->name_eng,
                'name_thai' => $request->name_thai,
                'nationality' => $request->nationality,
                'dob' => $dob,
                'age' => $age,
                'pob' => $request->pob,
                'headcount' => $request->headcount,
                'cost' => $request->cost,
                'pos_title' => $request->pos_title,
                'address' => $request->address,
            ]);
            return redirect()->route('employees')->with('success', "Updated Successfully");
        }*/
    }

    public function delete($Eid)
    {
        $img = Employee::find($Eid)->photo;
        unlink($img);
        $job = Employee::find($Eid)->job_file;
        unlink(storage_path('app/file/employees/job_description/' . $job));
        $organization = Employee::find($Eid)->organization_file;
        unlink(storage_path('app/file/employees/organization_chart/' . $organization));
        $resume = Employee::find($Eid)->resume_file;
        unlink(storage_path('app/file/employees/resume/' . $resume));
        $education = Employee::find($Eid)->education_file;
        unlink(storage_path('app/file/employees/education_certificate/' . $education));
        $employment = Employee::find($Eid)->employment_file;
        unlink(storage_path('app/file/employees/employment_certificate/' . $employment));
        //Delete in database
        $delete = Employee::find($Eid)->delete();
        return redirect()->back()->with('success', "Deleted Successfully");
    }
}
