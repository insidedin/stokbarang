<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
