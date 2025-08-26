<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class AuthController extends Controller

{



    public function home()
    {

        if (auth::check()) {
            return redirect(route('employee.index'));
        }
        return view('login.home');
    }

    public function login()

    {
        if (auth::check()) {
            return redirect(route('employee.index'));
        }
        return view('login.login');
    }


    public function loginpost(Request $req)
    {
        $req->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('employee.home'));
        } else {
            return redirect(route('login'))->with('error', 'Login details are not valid');
        }
    }

    public function registration()

    {
        if (auth::check()) {
            return redirect(route('employee.index'));
        }
        return view('login.registration');
    }






    public function registrationpost(Request $req)
    {
        if (auth::check()) {
            return redirect(route('employee.index'));
        }

        $req->validate([
            "name" => "required",
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);

        $user = user::create($data);
        if (!$user) {
            return redirect(route('registration'))->with('error', 'Registration Failed!!!');
        }
        return redirect(route('login'))->with('success', 'Registration Succeed,Login to access the content!!!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}