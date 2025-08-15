<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\validation\validator;
use Illuminate\Support\Facades\Auth;


class usercontroller extends Controller
{
    

        public function login_match(Request $req){
           $credentials= $req->validate([
            'email'=>'required |email',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials))
        {
            return redirect()->route('main_page');
        }
        else{
            echo("<h1>Do Not Match , Try Again</h1>");
            return view('login_page');
        }

    }


    public function login_save()
    {
        if (Auth::check()){
            return view('main');
        }
    else {
        return view('login_page');
    }
    

    }
}