<?php

use App\Http\Controllers\DependentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HeadcountController;
use App\Http\Controllers\NationalityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Nationality
Route::get('/nationality/all',[NationalityController::class, 'index'])->name('nationalities');
Route::post('/nationality/add',[NationalityController::class, 'store'])->name('addNationality');
Route::get('/nationality/edit/{nation_id}',[NationalityController::class,'edit']);
Route::post('/nationality/update/{nation_id}',[NationalityController::class,'update']);
Route::get('/nationality/delete/{nation_id}',[NationalityController::class,'delete']);

//headcoubt
Route::get('/headcount/all',[HeadcountController::class, 'index'])->name('headcounts');
Route::post('/headcount/add',[HeadcountController::class, 'store'])->name('addHeadcount');
Route::get('/headcount/edit/{count_id}',[HeadcountController::class,'edit']);
Route::post('/headcount/update/{count_id}',[HeadcountController::class,'update']);
Route::get('/headcount/delete/{count_id}',[HeadcountController::class,'delete']);

//Employee
Route::get('/employee/all',[EmployeeController::class, 'index'])->name('employees');
Route::get('/employee/create',[EmployeeController::class, 'create'])->name('createEmployee');
Route::post('/employee/add',[EmployeeController::class, 'store'])->name('addEmployee');
Route::get('/employee/show/{Eid}',[EmployeeController::class,'show']);
//Route::get('/employee/pdf/{Eid}',[EmployeeController::class,'pdf']);
Route::get('/employee/edit/{Eid}',[EmployeeController::class,'edit']);
Route::post('/employee/update/{Eid}',[EmployeeController::class,'update']);

//Department
Route::get('/dependent/all',[DependentController::class, 'index'])->name('dependents');
Route::get('/dependent/create',[DependentController::class, 'create'])->name('createDependent');