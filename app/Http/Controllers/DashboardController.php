<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::count();
        $petugas = Petugas::count();
        $tanggapan = Tanggapan::count();
        $masyarakat = Masyarakat::count();
        if (Auth::guard('masyarakat')->check()) {
            return view('index');
        } elseif (Auth::guard('petugas')->user()->level === 'admin') {
            return view('admin.index',compact('pengaduan','petugas','tanggapan','masyarakat'));
        } elseif (Auth::guard('petugas')->check()) {
            return view('admin.petugas.landing',compact('pengaduan','petugas','tanggapan','masyarakat'));
        }
    }
}
