<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {

        $pengaduan = Pengaduan::Paginate(5);
        if ($request->filter) {
            $pengaduan = Pengaduan::where('kategori', $request->filter)->get();
        }
        if ($request->date1 || $request->date2) {
            $date1 = Carbon::parse(request()->date1)->toDateTimeString();
            $date2 = Carbon::parse(request()->date2)->toDateTimeString();
            $pengaduan = Pengaduan::whereDate('created_at', '>=', $date1)->WhereDate('created_at', '<=', $date2)->get();
            // $complaints = Complaint::whereBetween('created_at', [$date1, $date2])->orWhere('created_at', [$date1, $date2])->get();
        }
        return view('admin.pengaduan.index', compact('pengaduan'));
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

    public function detailPengaduan(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }
}
