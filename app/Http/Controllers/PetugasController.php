<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {

        $petugas = Petugas::Paginate(5);

        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {

        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required'
        ]);

        $request['password'] = Hash::make($request['password']);
        Petugas::create($request->all());
        return redirect(route('petugas.index'));
    }

    public function edit(Petugas $petugas)
    {
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required'
        ]);

        $request['password'] = Hash::make($request['password']);
        $petugas->update($request->all());
        return redirect(route('petugas.index'));
    }

    public function destroy($id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        $petugas->delete();

        return redirect()->route('petugas.index')
            ->with('success', 'Delete Success!');
    }
}
