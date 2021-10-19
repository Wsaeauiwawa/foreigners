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
    public function create()
    {

        $data = Nationality::all();
        $headcount = Headcount::all();
        return view('dependents.create', ['data' => $data], ['headcount' => $headcount]);
    }
}
