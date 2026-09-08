<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect('/admindash');
        }

        if (Auth::user()->role === 'customer') {
            return redirect('/dashboard');
        }
    }

        return back()->withErrors([
            'email' => 'Email atau Password salah.',
            ])->onlyInput('email');
    }

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role' => 'customer',
        'status' => 'active',
    ]);

    return redirect('/login')->with(
        'success',
        'Registrasi berhasil! Silakan login.'
    );
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
