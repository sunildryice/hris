<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

// Route::get('/', function () {
//     return view('index');
// });

Route:: get('/',[employeecontroller::class,'index'])->name('employee.index');
Route::  get('/create',[employeecontroller::class,'create'])->name('employee.create');
Route::  post('/store',[employeecontroller::class,'store'])->name('employee.store');
Route:: get('/edit/{staff_id}',[employeeController::class,'edit'])->name('employee.edit');
Route::put('/update/{staff_id}',[employeecontroller::class,'update'])->name('employee.update');
Route:: delete('/delete/{staff_id}',[employeecontroller::class,'delete'])->name('employee.delete');


