<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\AuthController;
//Employees Index
Route::get('/home', [employeecontroller::class, 'home'])->name('employee.home');
Route::get('/index', [employeecontroller::class, 'index'])->name('employee.index');
Route::get('/index/create', [employeecontroller::class, 'create'])->name('employee.create');
Route::post('/index/store', [employeecontroller::class, 'store'])->name('employee.store');
Route::get('/edit/{staff_id}', [employeeController::class, 'edit'])->name('employee.edit');
Route::put('/update/{staff_id}', [employeecontroller::class, 'update'])->name('employee.update');
Route::delete('/delete/{staff_id}', [employeecontroller::class, 'delete'])->name('employee.delete');
Route::get('/details/{staff_id}', [employeeController::class, 'details'])->name('employee.details');

//details

Route::post('/detail/store/{emp_id}', [employeecontroller::class, 'detail_store'])->name('detail.store');
Route::delete('/delete/detail/{det_id}',[employeecontroller::class, 'detail_delete'])->name('detail.delete');



//Departments
Route::get('/dep', [employeecontroller::class, 'dep'])->name('employee.dep');
Route::get('/create_dep', [employeecontroller::class, 'create_dep'])->name('department.create');
Route::post('/store_dep', [employeecontroller::class, 'store_dep'])->name('department.store');
Route::get('/edit_dep/{dep_id}', [employeeController::class, 'edit_dep'])->name('dep.edit');
Route::put('/dep_update/{dep_id}', [employeecontroller::class, 'dep_update'])->name('dep_update');
Route::delete('/dep_delete/{dep_id}', [employeecontroller::class, 'dep_delete'])->name('dep.delete');

//Designation
Route::get('/desig', [employeecontroller::class, 'desig'])->name('employee.desig');
Route::get('/create_desig', [employeecontroller::class, 'create_desig'])->name('designation.create');
Route::post('/store_desig', [employeecontroller::class, 'store_desig'])->name('designation.store');
Route::get('/edit_desig/{desig_id}', [employeeController::class, 'edit_desig'])->name('desig.edit');
Route::put('/desig_update/{desig_id}', [employeecontroller::class, 'desig_update'])->name('desig_update');
Route::delete('/desig_delete/{desig_id}', [employeecontroller::class, 'desig_delete'])->name('desig.delete');

//Upload Excel File
Route::get('/upload_create', [employeecontroller::class, 'upload_create'])->name('upload.create');
Route::post('/upload_store', [employeecontroller::class, 'upload_store'])->name('upload.store');

//Login page
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');
Route::post('/registration', [AuthController::class, 'registrationpost'])->name('registrationpost');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::group(['middleware' => 'auth'], function () {
//     // It helps to open the profile page only when the user is login else not.
//     Route::get('/profile', function () {
//         return "HII";
//     });
// });
