<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Headcount;
use App\Models\Nationality;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
                'job' => 'max:10240',
                'organization' => 'max:10240',
                'resume' => 'max:10240',
                'education' => 'max:10240',
                'employment' => 'max:10240',
                'photo' => 'max:10240',
                'other' => 'max:10240'
            ],
            [
                'name_eng.unique' => "The Name-Midname-Surname in English has already been taken.",
                'name_thai.unique' => "The Name-Midname-Surname in Thai has already been taken.",
                'job.max' => "The job desctiption file must not be greater than 10 MB.",
                'organization.max' => "The organization chart file must not be greater than 10 MB.",
                'resume.max' => "The resume file must not be greater than 10 MB.",
                'education.max' => "The education certificate file must not be greater than 10 MB.",
                'employment.max' => "The employment certification must not be greater than 10 MB.",
                'photo.max' => "The photo must not be greater than 10 MB.",
                'other.max' => "The photo must not be greater than 10 MB.",
            ]
        );

        $job_file = $request->file('job');
        $organization_file = $request->file('organization');
        $resume_file = $request->file('resume');
        $education_file = $request->file('education');
        $employment_file = $request->file('employment');
        $photo = $request->file('photo');
        $other_file = $request->file('other');

        if ($job_file && $organization_file && $resume_file && $education_file && $employment_file && $photo && $other_file) {

            $job_name = time() . '_' . $job_file->getClientOriginalName();
            $job_location = 'employees/job_description/'; //location
            $job_path = $job_location . $job_name;    //path
            $job_file->move($job_location, $job_name);
            //$job_path = $job_file->storeAs('file/employees/job_description', $job_name);
            //dd($job_name);

            $organization_name = time() . '_' . $organization_file->getClientOriginalName();
            $organization_location = 'employees/organization_chart/'; //location
            $organization_path = $organization_location . $organization_name;    //path
            $organization_file->move($organization_location, $organization_name);
            //$organization_path = $organization_file->storeAs('file/employees/organization_chart', $organization_name);
            //dd($organization_path);

            $resume_name = time() . '_' . $resume_file->getClientOriginalName();
            $resume_location = 'employees/resume/'; //location
            $resume_path = $resume_location . $resume_name;    //path
            $resume_file->move($resume_location, $resume_name);
            //$resume_path = $resume_file->storeAs('file/employees/resume', $resume_name);
            //dd($resume_path);

            $education_name = time() . '_' . $education_file->getClientOriginalName();
            $education_location = 'employees/education_certificate/'; //location
            $education_path = $education_location . $education_name;    //path
            $education_file->move($education_location, $education_name);
            //$education_path = $education_file->storeAs('file/employees/education_certificate', $education_name);
            //dd($education_path);

            $employment_name = time() . '_' . $employment_file->getClientOriginalName();
            $employment_location = 'employees/employment_certificate/'; //location
            $employment_path = $employment_location . $employment_name;    //path
            $employment_file->move($employment_location, $employment_name);
            //$employment_path = $employment_file->storeAs('file/employees/employment_certificate', $employment_name);
            //dd($employment_path);

            $photo_name = time() . '_' . $photo->getClientOriginalName();   //Generate name
            $upload_location = 'employees/photos/'; //location
            $photo_path = $upload_location . $photo_name;    //path
            $photo->move($upload_location, $photo_name);

            $other_name = time() . '_' . $other_file->getClientOriginalName();
            $other_location = 'employees/other/'; //location
            $other_path = $other_location . $other_name;    //path
            $other_file->move($other_location, $other_name);
            //$other_path = $other_file->storeAs('file/employees/other', $other_name);

            $dob = $request->dob;
            $age = Carbon::parse($dob)->age;

            $emp = Employee::create([
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
                'photo_file' => $photo_name,
                'photo_path' => $photo_path,
                'other_file' => $other_name,
                'other_path' => $other_path,
            ]);
            //$Eid = $emp->Eid;

            return redirect()->route('employees')->with('success', 'Created Successfully');
            //return redirect()->route('createEmployee', [$Eid]);
        } elseif ($job_file && $organization_file && $resume_file && $education_file && $employment_file && $photo) {

            $job_name = time() . '_' . $job_file->getClientOriginalName();
            $upload_location = 'employees/job_description/'; //location
            $job_path = $upload_location . $job_name;    //path
            $job_file->move($upload_location, $job_name);
            //$job_path = $job_file->storeAs('file/employees/job_description', $job_name);
            //dd($job_name);

            $organization_name = time() . '_' . $organization_file->getClientOriginalName();
            $upload_location = 'employees/organization_chart/'; //location
            $organization_path = $upload_location . $organization_name;    //path
            $organization_file->move($upload_location, $organization_name);
            //$organization_path = $organization_file->storeAs('file/employees/organization_chart', $organization_name);
            //dd($organization_path);

            $resume_name = time() . '_' . $resume_file->getClientOriginalName();
            $upload_location = 'employees/resume/'; //location
            $resume_path = $upload_location . $resume_name;    //path
            $resume_file->move($upload_location, $resume_name);
            //$resume_path = $resume_file->storeAs('file/employees/resume', $resume_name);
            //dd($resume_path);

            $education_name = time() . '_' . $education_file->getClientOriginalName();
            $upload_location = 'employees/education_certificate/'; //location
            $education_path = $upload_location . $education_name;    //path
            $education_file->move($upload_location, $education_name);
            //$education_path = $education_file->storeAs('file/employees/education_certificate', $education_name);
            //dd($education_path);

            $employment_name = time() . '_' . $employment_file->getClientOriginalName();
            $upload_location = 'employees/employment_certificate/'; //location
            $employment_path = $upload_location . $employment_name;    //path
            $employment_file->move($upload_location, $employment_name);
            //$employment_path = $employment_file->storeAs('file/employees/employment_certificate', $employment_name);
            //dd($employment_path);

            $photo_name = time() . '_' . $photo->getClientOriginalName();   //Generate name
            $upload_location = 'employees/photos/'; //location
            $photo_path = $upload_location . $photo_name;    //path
            $photo->move($upload_location, $photo_name);
        }

        $dob = $request->dob;
        $age = Carbon::parse($dob)->age;

        $emp = Employee::create([
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
            'photo_file' => $photo_name,
            'photo_path' => $photo_path,
        ]);

        //$Eid = $emp->Eid;
        //dd($Eid);
        return redirect()->route('employees')->with('success', 'Created Successfully');
        //return redirect()->route('createEmployee', [$Eid]);
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
                'photo' => 'max:10240',
                'other' => 'max:10240'
            ],
            [
                'job.max' => "The job desctiption file must not be greater than 10 MB.",
                'organization.max' => "The organization chart file must not be greater than 10 MB.",
                'resume.max' => "The resume file must not be greater than 10 MB.",
                'education.max' => "The education certificate file must not be greater than 10 MB.",
                'employment.max' => "The employment certification must not be greater than 10 MB.",
                'photo.max' => "The photo must not be greater than 10 MB.",
                'other.max' => "The photo must not be greater than 10 MB.",
            ]
        );

        $photo = $request->file('photo');
        $job_file = $request->file('job');
        $organization_file = $request->file('organization');
        $resume_file = $request->file('resume');
        $education_file = $request->file('education');
        $employment_file = $request->file('employment');
        $other_file = $request->file('other');

        if ($photo) {
            $photo_name = time() . '_' . $photo->getClientOriginalName();   //Generate name
            $upload_location = 'employees/photos/'; //location
            $photo_path = $upload_location . $photo_name;    //path
            //dd($photo);

            Employee::find($Eid)->update([
                'photo_file' => $photo_name,
                'photo_path' => $photo_path,
            ]);

            $old_image = $request->old_image;
            //dd($old_image);
            unlink(public_path('employees/photos/' . $old_image));
            $photo->move($upload_location, $photo_name);

            return redirect()->route('employees')->with('success', "Updated Photo Successfully");

        } elseif ($job_file) {
            $job = Employee::find($Eid)->job_file;
            unlink(public_path('employees/job_description/' . $job));
            $job_name = time() . '_' . $job_file->getClientOriginalName();
            $upload_location = 'employees/job_description/'; //location
            $job_path = $upload_location . $job_name;    //path
            $job_file->move($upload_location, $job_name);

            Employee::find($Eid)->update([
                'job_file' => $job_name,
                'job_path' => $job_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Job Description Successfully");

        } elseif ($organization_file) {
            $organization = Employee::find($Eid)->organization_file;
            unlink(public_path('employees/organization_chart/' . $organization));
            $organization_name = time() . '_' . $organization_file->getClientOriginalName();
            $upload_location = 'employees/organization_chart/'; //location
            $organization_path = $upload_location . $organization_name;    //path
            $organization_file->move($upload_location, $organization_name);
            //unlink(storage_path('app/file/employees/organization_chart/' . $organization));
            //$organization_path = $organization_file->storeAs('file/employees/organization_chart', $organization_name);

            Employee::find($Eid)->update([
                'organization_file' => $organization_name,
                'organization_path' => $organization_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Organization Chart Successfully");

        } elseif ($resume_file){
            $resume = Employee::find($Eid)->resume_file;
            unlink(public_path('employees/resume/' . $resume));
            $resume_name = time() . '_' . $resume_file->getClientOriginalName();
            $upload_location = 'employees/resume/'; //location
            $resume_path = $upload_location . $resume_name;    //path
            $resume_file->move($upload_location, $resume_name);
            //unlink(storage_path('app/file/employees/resume/' . $resume));
            //$resume_path = $resume_file->storeAs('file/employees/resume', $resume_name);

            Employee::find($Eid)->update([
                'resume_file' => $resume_name,
                'resume_path' => $resume_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Resume Successfully");

        } elseif ($education_file) {
            $education = Employee::find($Eid)->education_file;
            unlink(public_path('employees/education_certificate/' . $education));
            //unlink(storage_path('app/file/employees/education_certificate/' . $education));
            $education_name = time() . '_' . $education_file->getClientOriginalName();
            $upload_location = 'employees/education_certificate/'; //location
            $education_path = $upload_location . $education_name;    //path
            $education_file->move($upload_location, $education_name);

           // $education_path = $education_file->storeAs('file/employees/education_certificate', $education_name);

            Employee::find($Eid)->update([
                'education_file' => $education_name,
                'education_path' => $education_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Education Certificate Successfully");
            
        } elseif ($employment_file) {
            $employment = Employee::find($Eid)->employment_file;
            //unlink(storage_path('app/file/employees/employment_certificate/' . $employment));
            $employment_name = time() . '_' . $employment_file->getClientOriginalName();
            unlink(public_path('employees/employment_certificate/' . $employment));
            $upload_location = 'employees/employment_certificate/'; //location
            $employment_path = $upload_location . $employment_name;    //path
            $employment_file->move($upload_location, $employment_name);

            //$employment_path = $employment_file->storeAs('file/employees/employment_certificate', $employment_name);

            Employee::find($Eid)->update([
                'employment_file' => $employment_name,
                'employment_path' => $employment_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Employment Certificate Successfully");

        }elseif ($other_file) {

            $other = Employee::find($Eid)->other_file;
            unlink(public_path('employees/other/' . $other));
            //unlink(storage_path('app/file/employees/other/' . $other));
            $other_name = time() . '_' . $other_file->getClientOriginalName();
            $upload_location = 'employees/other/'; //location
            $other_path = $upload_location . $other_name;    //path
            $other_file->move($upload_location, $other_name);
            //$other_path = $other_file->storeAs('file/employees/other', $other_name);

            Employee::find($Eid)->update([
                'other_file' => $other_name,
                'other_path' => $other_path,
            ]);
            return redirect()->route('employees')->with('success', "Updated Other File Successfully");

        } else {
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

        }
    }
}
