<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index(){
        $nationality = Nationality::paginate(10);

        return view('nationalities.index',compact('nationality'));
    }

    public function store(Request $request){
        $request->validate([
            'nation_name' => 'required|unique:std_nationalities'
         ],
         [
            'nation_name.required' => "The nationality field is required.",
            'nation_name.unique' => "The nationality has already been taken.",
         ]
         );

         $nationality = new Nationality;
         $nationality->nation_name = $request->nation_name;
         $nationality->save();
         return redirect()->back()->with('success', "Successfully");
    }

    public function edit($nation_id)
    {
       $nationality = Nationality::find($nation_id);
       //dd($nationality->nation_name);
       return view('nationalities.edit',compact('nationality'));
    }
    
    public function update(Request $request, $nation_id){
        
        $request->validate([
            'nation_name' => 'required|unique:std_nationalities'
         ],
         [
            'nation_name.required' => "The nationality field is required.",
            'nation_name.unique' => "The nationality has already been taken.",
         ]
         );
        $update = Nationality::find($nation_id);
        $update->nation_name = $request->nation_name;
        $update->save();
        return redirect()->route('nationalities')->with('success', "Updated Successfully");
    }

    public function delete($nation_id)
    {
        $delete = Nationality::find($nation_id)->delete();
        return redirect()->back()->with('success', "Deleted Successfully");
    }


    
}
