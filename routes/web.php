<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\SensusController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KelompokController;

use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\Sensus;
use App\Models\Keluarga;
use App\Models\Kelompok;
use App\Models\RumahTangga;
use App\Models\ProgramBantuan;

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
    $desa = Desa::find(request('desa'));
    $dusuns = Dusun::all();
    $sensus = Sensus::all();
    $keluarga = Keluarga::all();
    $kelompok = Kelompok::all();
    $rumah_tangga = RumahTangga::all();

    return view('admin.index', [
        'total_dusun' => $dusuns->count(),
        'total_sensus' => $sensus->count(),
        'total_keluarga' => $keluarga->count(),
        'total_kelompok' => $kelompok->count(),
        'total_rt' => $rumah_tangga->count(),
        'desa' => $desa
    ]);
})->middleware('auth');

Route::get('/admin/wilayah_desa', [DusunController::class, 'index']);
Route::post('/admin/wilayah_desa/tambah', [DusunController::class, 'tambah']);
Route::get('/admin/wilayah_desa/hapus', [DusunController::class, 'hapus']);
Route::post('/admin/wilayah_desa/ubah', [DusunController::class, 'ubah']);

Route::get('/admin/penduduk', [SensusController::class, 'index']);
Route::post('/admin/penduduk/tambah', [SensusController::class, 'tambah']);
Route::get('/admin/penduduk/hapus', [SensusController::class, 'hapus']);
Route::get('/admin/penduduk/detail', [SensusController::class, 'detail']);
Route::post('/admin/penduduk/ubah', [SensusController::class, 'ubah']);

Route::get('/admin/keluarga', [KeluargaController::class, 'index']);
Route::post('/admin/keluarga/tambah', [KeluargaController::class, 'tambah']);
Route::get('/admin/keluarga/hapus', [KeluargaController::class, 'hapus']);
Route::post('/admin/keluarga/ubah', [KeluargaController::class, 'ubah']);
Route::get('/admin/keluarga/detail', [KeluargaController::class, 'detail']);
Route::post('/admin/keluarga/anggota/tambah', [KeluargaController::class, 'tambahAnggota']);
Route::get('/admin/keluarga/anggota/hapus', [KeluargaController::class, 'hapusAnggota']);
Route::post('/admin/keluarga/anggota/ubah', [KeluargaController::class, 'ubahAnggota']);

Route::get('/admin/kelompok', [KelompokController::class, 'index']);
Route::post('/admin/kelompok/tambah', [KelompokController::class, 'tambah']);
Route::get('/admin/kelompok/hapus', [KelompokController::class, 'hapus']);
Route::post('/admin/kelompok/ubah', [KelompokController::class, 'ubah']);
Route::get('/admin/kelompok/kategori', [KelompokController::class, 'indexKategori']);
Route::post('/admin/kelompok/kategori/tambah', [KelompokController::class, 'tambahKategori']);
Route::get('/admin/kelompok/kategori/hapus', [KelompokController::class, 'hapusKategori']);
Route::get('/admin/kelompok/detail', [KelompokController::class, 'detail']);
Route::post('/admin/kelompok/anggota/tambah', [KelompokController::class, 'tambahAnggota']);
Route::get('/admin/kelompok/anggota/hapus', [KelompokController::class, 'hapusAnggota']);
Route::post('/admin/kelompok/anggota/ubah', [KelompokController::class, 'ubahAnggota']);

Route::get('/admin/rumah-tangga', function() {
    $desa = Desa::find(request('desa'));
    $semua_rt = RumahTangga::all();

    return view('admin.rumah-tangga', [
        'desa' => $desa,
        'semua_rt' => $semua_rt
    ]);
});

Route::post('/admin/rumah-tangga/tambah', function(Request $request) {
    RumahTangga::create([
        'no_rt' => $request->input('nomor_rt'),
        'nik_kepala_rt' => $request->input('kepala_rt'),
        'alamat' => $request->input('alamat'),
        'dusun' => $request->input('dusun'),
        'rw' => $request->input('rw'),
        'rt' => $request->input('rt'),
        'tanggal_terdaftar' => date('Y-m-d')
    ]);

    return back();
});

Route::get('/admin/rumah-tangga/hapus', function() {
    $rt = RumahTangga::find(request('rt'));
    $rt->delete();

    return back();
});

Route::post('/admin/rumah-tangga/ubah', function(Request $request) {
    $rt = RumahTangga::find(request('rt_id'));

    $rt->no_rt = $request->input('nomor_rt');
    $rt->nik_kepala_rt = $request->input('kepala_rt');
    $rt->alamat = $request->input('alamat');
    $rt->dusun = $request->input('dusun');
    $rt->rt = $request->input('rt');
    $rt->rw = $request->input('rw');

    $rt->save();

    return back();
});

Route::get('/admin/rumah-tangga/detail', function() {
    $rt = RumahTangga::find(request('rt'));
    $desa = Desa::find(request('desa'));
    $anggota = $rt->anggota;

    return view('admin.rumah-tangga-detail', [
        'rumah_tangga' => $rt,
        'desa' => $desa,
        'anggota' => $anggota
    ]);
});

Route::get('/admin/rumah-tangga/anggota/hapus', function() {
    $anggotaRT = Sensus::find(request('sensus'));
    $anggotaRT->no_rumah_tangga = 0;
    $anggotaRT->save();

    return back();
});

Route::post('/admin/rumah-tangga/anggota/tambah', function(Request $request) {
    $sensus = Sensus::firstWhere('nik', $request->input('nik'));
    $sensus->no_rumah_tangga = $request->input('no_rt');
    $sensus->hubungan_keluarga = $request->input('hubungan_rt');
    $sensus->save();

    return back();
});

Route::post('/admin/rumah-tangga/anggota/ubah', function(Request $request) {
    $sensus = Sensus::firstWhere('nik', $request->input('nik'));
    $sensus->hubungan_keluarga = $request->input('hubungan_rt');
    $sensus->save();

    return back();
});

Route::get('/admin/program-bantuan', function() {
	$desa = Desa::find(request('desa'));
	$semua_bantuan = ProgramBantuan::all();

	return view('admin.program_bantuan', [
		'desa' => $desa,
		'semua_bantuan' => $semua_bantuan
	]);
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
