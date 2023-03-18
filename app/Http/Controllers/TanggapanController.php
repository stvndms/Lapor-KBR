<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    public function index()
    {

        $tanggapan = Tanggapan::Paginate(5);
        return view('admin.tanggapan.dashboard', compact('tanggapan'));
    }


    public function create(Pengaduan $pengaduan)
    {

        return view('admin.tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        (['status' => 'selesai']);
        Tanggapan::create($request->all());
        $pengaduan->update(['status' => 'selesai']);
        return redirect(route('pengaduan.index'));
    }
}
