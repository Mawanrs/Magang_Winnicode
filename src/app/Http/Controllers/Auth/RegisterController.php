<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255|unique:users,name',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);

    \Illuminate\Support\Facades\Auth::login($user);

    return redirect('/ ')->with('success', 'Registration successful! Welcome, ' . $user->name . '!');
}

}
