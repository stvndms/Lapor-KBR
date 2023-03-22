<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PDFController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('guest:masyarakat,petugas');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest:masyarakat,petugas');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:petugas,masyarakat');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//


// register route
Route::get('/register', [RegisterController::class, 'index'])->name('regis')->middleware('guest:masyarakat,petugas');
Route::post('register', [RegisterController::class, 'store'])->name('register');
//


// Petugas Route
Route::resource('/dashboard/petugas', PetugasController::class)->middleware('CheckGuard:petugas');
//


//  Pengaduan Route
Route::resource('/dashboard/pengaduan', PengaduanController::class)->except('show');
Route::get('/dashboard/pengaduan/detail/{pengaduan:id_pengaduan}', [PengaduanController::class, 'detailPengaduan'])->name('pengaduan.show');
Route::get('/pengaduan', [PengaduanController::class, 'indexMasyarakat'])->middleware('CheckGuard:masyarakat')->name('pengaduanMasyarakat');
Route::put('/dashboard/pengaduan/{pengaduan:id_pengaduan}/verifikasi', [PengaduanController::class, 'verification'])->name('verification');

// Tanggapan Route

Route::get('/tanggapan', [TanggapanController::class, 'index'])->middleware('CheckGuard:petugas');
Route::get('/tanggapan/{pengaduan:id_pengaduan}', [TanggapanController::class, 'create'])->middleware('CheckGuard:petugas')->name('tanggapan');
Route::put('/tanggapan/{pengaduan:id_pengaduan}', [TanggapanController::class, 'store'])->name('beriTanggapan');

//Print Laporan
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
