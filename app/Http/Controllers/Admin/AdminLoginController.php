<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller 
{
    public function showLogin() { return view('admin.login'); }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors(['email' => 'Email atau Password salah!']);
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}