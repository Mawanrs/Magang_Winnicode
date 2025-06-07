<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function showRegisterForm()
    {
        return view('register.register');
    }
}
