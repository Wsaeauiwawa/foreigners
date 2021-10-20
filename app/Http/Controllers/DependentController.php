<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use Illuminate\Http\Request;
use App\Models\Headcount;
use App\Models\Nationality;

class DependentController extends Controller
{
    public function index()
    {

        $dependents = Dependent::paginate(25);
        return view('dependents.index', compact('dependents'));
    }
   
}
