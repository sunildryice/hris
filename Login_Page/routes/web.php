<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagecontroller;
use App\Http\Controllers\usercontroller;


Route ::get('/pagecontroller',[PageController::class,'ShowUser']);

Route :: post('/user',[userController:: class,'login_match'])->name('login_match');

Route:: get('/login_page',function() {
    return view('login_page');
})->name('login_page');

Route::get('/',function(){
return view('dashboard');}
)->name('dashboard');
// it can also be done with  route::view('dashboard','dashboard')->name('dashboard');


Route::get('/main_page',[usercontroller::class,'login_save'])->name('main_page');
Route:: view('main','main')->name('main');