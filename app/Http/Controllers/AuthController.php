<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/home');
        }
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    


}