<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Headcount;
use App\Models\Nationality;
use Carbon\Carbon;

class DependentController extends Controller
{
    public function index()
    {

        $dependents = Dependent::paginate(25);
        $data = Employee::all();
        return view('dependents.index', compact('dependents'));
    }

    public function create()
    {

        $data = Nationality::all();
        return view('dependents.create', ['data' => $data]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name_eng' => 'unique:employees',
    //             'marriage' => 'max:10240',
    //             'birth' => 'max:10240',
    //             'passport' => 'max:10240',
    //             'photo' => 'max:10240',
    //             'other' => 'max:10240'
    //         ],
    //         [
    //             'name_eng.unique' => "The Name-Midname-Surname in English has already been taken.",
    //             'marriage.max' => "The job desctiption file must not be greater than 10 MB.",
    //             'birth.max' => "The organization chart file must not be greater than 10 MB.",
    //             'passport.max' => "The resume file must not be greater than 10 MB.",
    //             'photo.max' => "The photo must not be greater than 10 MB.",
    //             'other.max' => "The photo must not be greater than 10 MB.",
    //         ]

    //     );

    //     $marriage = $request->file('marriage');
    //     $birth = $request->file('birth');
    //     $passport = $request->file('passport');
    //     $photo = $request->file('photo');
    //     $other = $request->file('other');

    //     if($marriage && $birth && $passport && $photo && $other) {
    //         $marriage_name = time() . '_' . $marriage->getClientOriginalName();
    //         $marriage_location = 'dependents/marriage_certificate/';
    //         $marriage_path = $marriage_location . $marriage_name;
    //         $marriage->move($marriage_location, $marriage_name);

    //         $birth_name = time() . '_' . $birth->getClientOriginalName();
    //         $birth_location = 'dependents/birth_certificate/';
    //         $birth_path = $birth_location . $birth_name;
    //         $birth->move($birth_location, $birth_name);

    //         $passport_name = time() . '_' . $passport->getClientOriginalName();
    //         $passport_location = 'dependents/passport/';
    //         $passport_path = $passport_location . $passport_name;
    //         $passport->move($passport_location, $passport_name);

    //         $photo_name = time() . '_' . $photo->getClientOriginalName();
    //         $upload_location = 'dependents/photos/';
    //         $photo_path = $upload_location . $photo_name;
    //         $photo->move($upload_location, $photo_name);

    //         $other_name = time() . '_' . $other->getClientOriginalName();
    //         $other_location = 'dependents/other/';
    //         $other_path = $other_location . $other_name;
    //         $other->move($other_location, $other_name);

    //         $dob = $request->dob;
    //         $age = Carbon::parse($dob)->age;

    //         Dependent::create([
    //             'relationship'=>$request->relationship,
    //             'title' => $request->title,
    //             'name' => $request->name,
    //             'nationality' => $request->nationality,
    //             'dob' => $dob,
    //             'age' => $age,
    //             'pob' => $request->pob,
    //             'marriage_file' => $marriage_name,
    //             'marriage_path' => $marriage_path,
    //             'birth_file' => $birth_name,
    //             'birth_path' => $birth_path,
    //             'passport_file' => $passport_name,
    //             'passport_path' => $passport_path,
    //             'photo_file' => $photo_name,
    //             'photo_path' => $photo_path,
    //             'other_file' => $other_name,
    //             'other_path' => $other_path,
    //         ]);
    //         return redirect()->route('dependents')->with('success', "Created Successfully");

    //     } elseif($marriage && $birth && $passport && $photo){
    //         $marriage_name = time() . '_' . $marriage->getClientOriginalName();
    //         $marriage_location = 'dependents/marriage_certificate/';
    //         $marriage_path = $marriage_location . $marriage_name;
    //         $marriage->move($marriage_location, $marriage_name);

    //         $birth_name = time() . '_' . $birth->getClientOriginalName();
    //         $birth_location = 'dependents/birth_certificate/';
    //         $birth_path = $birth_location . $birth_name;
    //         $birth->move($birth_location, $birth_name);

    //         $passport_name = time() . '_' . $passport->getClientOriginalName();
    //         $passport_location = 'dependents/passport/';
    //         $passport_path = $passport_location . $passport_name;
    //         $passport->move($passport_location, $passport_name);

    //         $photo_name = time() . '_' . $photo->getClientOriginalName();
    //         $upload_location = 'dependents/photos/';
    //         $photo_path = $upload_location . $photo_name;
    //         $photo->move($upload_location, $photo_name);

    //         $dob = $request->dob;
    //         $age = Carbon::parse($dob)->age;

    //         Dependent::create([
    //             'relationship'=>$request->relationship,
    //             'title' => $request->title,
    //             'name' => $request->name,
    //             'nationality' => $request->nationality,
    //             'dob' => $dob,
    //             'age' => $age,
    //             'pob' => $request->pob,
    //             'marriage_file' => $marriage_name,
    //             'marriage_path' => $marriage_path,
    //             'birth_file' => $birth_name,
    //             'birth_path' => $birth_path,
    //             'passport_file' => $passport_name,
    //             'passport_path' => $passport_path,
    //             'photo_file' => $photo_name,
    //             'photo_path' => $photo_path,
    //         ]);
    //         return redirect()->route('dependents')->with('success', "Created Successfully");
    //     }
        




    // }
   
}
