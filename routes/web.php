<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Dusun;

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
    return view('admin.index');
})->middleware('auth');
Route::get('/admin/wilayah_desa', function() {
    $semua_dusun = Dusun::all();

    return view('admin.dusun', [
        'semua_dusun' => $semua_dusun
    ]);
});
Route::post('/admin/wilayah_desa/tambah', function(Request $request) {
    $nama = $request->input('nama-dusun');
    $kepala = $request->input('kepala-dusun');

    Dusun::create([
        'nama' => $nama,
        'kepala_dusun' => $kepala
    ]);

    return back();
});
Route::get('/admin/wilayah_desa/hapus/{id}', function($id) {
    $dusun_hapus = Dusun::find($id);
    $dusun_hapus->delete();

    return back();
});
Route::post('/admin/wilayah_desa/ubah/{id}', function(Request $request, $id) {
     $nama = $request->input('nama-dusun');
     $kepala = $request->input('kepala-dusun');
     $rw = $request->input('jumlah-rw');
     $rt = $request->input('jumlah-rt');
     $kk = $request->input('jumlah-kk');
     $lp = $request->input('jumlah-lp');
     $l = $request->input('jumlah-l');
     $p = $request->input('jumlah-p');

     $dusun = Dusun::find($id);
     $dusun->nama = $nama;
     $dusun->kepala_dusun = $kepala;
     $dusun->jumlah_rw = $rw;
     $dusun->jumlah_rt = $rt;
     $dusun->jumlah_kk = $kk;
     $dusun->jumlah_lp = $lp;
     $dusun->jumlah_l = $l;
     $dusun->jumlah_p = $p;
     $dusun->save();

     return back();

     dd($request);
});

Route::get('/login/penduduk', [LoginController::class, 'loginPendudukTampilan'])->name('login-penduduk');
Route::post('/login/penduduk', [LoginController::class, 'loginPenduduk']);
Route::post('/login/admin', [LoginController::class, 'loginAdmin']);
Route::get('/login/admin', [LoginController::class, 'loginAdminTampilan'])->name('login-admin');

Route::get('/daftar', function(Request $request) {
    $status = $request->session()->get('status');
    return view('daftar', [
        'status' => $status
    ]);
});

Route::post('/daftar', function(Request $request) {
    $no_kk = $request->input('no_kk');
    $nik = $request->input('nik');
    $nama = $request->input('nama');
    $tempat_lahir = $request->input('tempat_lahir');
    $tanggal_lahir = $request->input('tanggal_lahir');
    $tempat_tinggal = $request->input('tempat_tinggal');
    $jenis_kelamin = $request->input('jenis_kelamin');
    $pin = $request->input('pin');

    $identik = Penduduk::firstWhere('nik', $nik);

    if ($identik == null) {
        Penduduk::create([
            "nik" => $nik,
            "no_kk" => $no_kk,
            "nama" => $nama,
            "tempat_lahir" => $tempat_lahir,
            "tempat_tinggal" => $tempat_tinggal,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $jenis_kelamin,
            "pin" => $pin
        ]);
        $request->session()->flash('status', 'daftar-berhasil');
        return redirect("/profil/$nik");
    } else {
        $request->session()->flash('status', 'daftar-gagal-nik');
        return back();
    }
});

Route::get('/profil/{nik}', function(Request $request, $nik) {
    $penduduk = Penduduk::firstWhere('nik', $nik);

    $data = [
        "penduduk" => $penduduk
    ];

    if ($request->session()->get('status')) {
        $data['status'] = $request->session()->get('status');
    } else {
        $data['status'] = null;
    }

    return view('profil', $data);
})->middleware('penduduk');
