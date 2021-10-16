<?php

namespace App\Http\Controllers;

use App\Models\Headcount;
use Illuminate\Http\Request;

class HeadcountController extends Controller
{
    public function index(){
        $headcount = Headcount::paginate(10);

        return view('headcount.index',compact('headcount'));
    }

    public function store(Request $request){
        $request->validate([
            'count_name' => 'required|unique:std_headcounts'
         ],
         [
            'count_name.required' => "The headcount field is required.",
            'count_name.unique' => "The headcount has already been taken.",
         ]
         );

         $headcount = new Headcount();
         $headcount->count_name = $request->count_name;
         $headcount->save();
         return redirect()->back()->with('success', "Successfully");
    }

    public function edit($count_id)
    {
       $headcount = Headcount::find($count_id);
       //dd($headcount->count_name);
       return view('headcount.edit',compact('headcount'));
    }

    public function update(Request $request, $count_id){
        
        $request->validate([
            'count_name' => 'required|unique:std_headcounts'
         ],
         [
            'count_name.required' => "The headcount field is required.",
            'count_name.unique' => "The headcount has already been taken.",
         ]
         );

        $update = Headcount::find($count_id);
        $update->count_name = $request->count_name;
        $update->save();
        return redirect()->route('headcounts')->with('success', "Updated Successfully");
    }

    public function delete($count_id)
    {
        $delete = Headcount::find($count_id)->delete();
        return redirect()->back()->with('success', "Deleted Successfully");
    }



    
}
