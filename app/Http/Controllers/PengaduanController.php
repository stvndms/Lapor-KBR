<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PengaduanController extends Controller
{
    public function index()
    {

        $pengaduan = Pengaduan::Paginate(5);
        $tanggapan = Tanggapan::all();
        return view('admin.pengaduan.index', compact('pengaduan', 'tanggapan'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image', 'file', 'max:3024'
        ]);
        $validatedData['nik'] = Auth::guard('masyarakat')->user()->nik;
        $validatedData['status'] = '0';
        $validatedData['foto'] = $request->file('foto')->store('public/images');
        $validatedData['foto'] = substr($validatedData['foto'], 7);
        Pengaduan::create($validatedData);
        return redirect(route('dashboard'));
    }

    public function showMasyarakat(Pengaduan $pengaduan)
    {
        return view('masyarakat.dashboard', compact('pengaduan'));
    }

    public function indexMasyarakat()
    {
        $data = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->get();
        return view('masyarakat.dashboard', compact('data'));
    }

    public function verification(Pengaduan $pengaduan)
    {
        $pengaduan->update(['status' => 'proses']);
        return redirect(route('pengaduan.index'));
    }
}
