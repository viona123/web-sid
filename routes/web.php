<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Models\Penduduk;

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
    return view('home.welcome');
});
Route::get('/tentang', function() {
    return view('home.tentang');
});
Route::get('/admin', function() {
    return view('admin');
})->middleware('auth');

Route::get('/login/penduduk', [LoginController::class, 'loginPendudukTampilan']);
Route::post('/login/penduduk', [LoginController::class, 'loginPenduduk']);
Route::post('/login/admin', [LoginController::class, 'loginAdmin']);
Route::get('/login/admin', [LoginController::class, 'loginAdminTampilan'])->name('login-admin');

Route::get('/daftar', function() {
    return view('daftar');
});

Route::post('/daftar', function(Request $request) {
    $no_kk = $request->input('no_kk');
    $nik = $request->input('nik');
    $nama = $request->input('nama');
    $tempat_lahir = $request->input('tempat_lahir');
    $tanggal_lahir = $request->input('tanggal_lahir');
    $tempat_lahir = $request->input('tempat_tinggal');
    $jenis_kelamin = $request->input('jenis_kelamin');
    $pin = $request->input('pin');

    Penduduk::create([
        "nik" => $nik,
        "no_kk" => $no_kk,
        "nama" => $nama,
        "tempat_lahir" => $tempat_lahir,
        "tempat_tinggal" => $tempat_lahir,
        "tanggal_lahir" => $tanggal_lahir,
        "jenis_kelamin" => $jenis_kelamin,
        "pin" => $pin
    ]);

    return "Data sudah diproses";
});

Route::get('/profil/{nik}', function($nik) {
    $penduduk = Penduduk::firstWhere('nik', $nik);

    return view('profil', [
        "penduduk" => $penduduk
    ]);
});