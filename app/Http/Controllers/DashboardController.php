<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('masyarakat')->check()) {
            return view('index');
        } elseif (Auth::guard('petugas')->user()->level === 'admin') {
            return view('admin.index');
        } elseif (Auth::guard('petugas')->check()) {
            return view('admin.petugas.landing');
        }
    }
}
