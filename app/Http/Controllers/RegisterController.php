<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register');
    }

    public function store(Request $request){
    $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
    ]);
    $request['password'] = Hash::make($request['password']);
    Masyarakat::create($request->all());
    return redirect(route('login'));
    }
}
