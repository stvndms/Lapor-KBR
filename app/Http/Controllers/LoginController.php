<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'));
        } elseif (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'));
        }
        return back()->with('loginError', 'Login failed');
    }


    public function logout()
    {

        if (Auth::guard('masyarakat')) {
            Auth::guard('masyarakat')->logout();
        } elseif (Auth::guard('petugas')) {
            Auth::guard('petugas')->logout();
        }

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
