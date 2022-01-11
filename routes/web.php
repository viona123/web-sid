<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\SensusController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\RumahTanggaController;
use App\Http\Controllers\ProgramBantuanController;
use App\Http\Controllers\IdentitasDesaController;
use App\Http\Controllers\PengurusDesaController;

use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\Sensus;
use App\Models\Keluarga;
use App\Models\Kelompok;
use App\Models\RumahTangga;
use App\Models\ProgramBantuan;
use App\Models\PenerimaBantuan;
use App\Models\StaffDesa;

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

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

    $dusuns = $desa->dusun;
    $sensus = $desa->sensus;
    $keluarga = $desa->keluarga;
    $kelompok = $desa->kelompok;
    $rumah_tangga = $desa->rumahTangga;

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

Route::get('/admin/rumah-tangga', [RumahTanggaController::class, 'index']);
Route::post('/admin/rumah-tangga/tambah', [RumahTanggaController::class, 'tambah']);
Route::get('/admin/rumah-tangga/hapus', [RumahTanggaController::class, 'hapus']);
Route::post('/admin/rumah-tangga/ubah', [RumahTanggaController::class, 'ubah']);
Route::get('/admin/rumah-tangga/detail', [RumahTanggaController::class, 'detail']);

Route::get('/admin/rumah-tangga/anggota/hapus', [RumahTanggaController::class, 'hapusAnggota']);
Route::post('/admin/rumah-tangga/anggota/tambah', [RumahTanggaController::class, 'tambahAnggota']);
Route::post('/admin/rumah-tangga/anggota/ubah', [RumahTanggaController::class, 'ubahAnggota']);

Route::get('/admin/program-bantuan', [ProgramBantuanController::class, 'index']);
Route::post('/admin/program-bantuan/tambah', [ProgramBantuanController::class, 'tambah']);
Route::post('/admin/program-bantuan/ubah', [ProgramBantuanController::class, 'ubah']);
Route::get('/admin/program-bantuan/hapus', [ProgramBantuanController::class, 'hapus']);
Route::get('/admin/program-bantuan/detail', [ProgramBantuanController::class, 'detail']);

Route::post('/admin/program-bantuan/penerima/tambah', [ProgramBantuanController::class, 'tambahPenerima']);
Route::get('/admin/program-bantuan/penerima/hapus', [ProgramBantuanController::class, 'hapusPenerima']);

Route::get('/admin/identitas_desa', [IdentitasDesaController::class, 'index']);
Route::post('/admin/identitas_desa/ubah', [IdentitasDesaController::class, 'ubah']);

Route::get('/admin/pengurus_desa', [PengurusDesaController::class, 'index']);
Route::get('/admin/pengurus_desa/ubah-status', [PengurusDesaController::class, 'ubahStatus']);
Route::get('/admin/pengurus_desa/hapus', [PengurusDesaController::class, 'hapus']);
Route::post('/admin/pengurus_desa/tambah', [PengurusDesaController::class, 'tambah']);
Route::post('/admin/pengurus_desa/ubah', [PengurusDesaController::class, 'ubah']);

Route::get('/login/penduduk', [LoginController::class, 'loginPendudukTampilan'])->name('login-penduduk');
Route::post('/login/penduduk', [LoginController::class, 'loginPenduduk']);
Route::post('/login/admin', [LoginController::class, 'loginAdmin']);
Route::get('/login/admin', [LoginController::class, 'loginAdminTampilan'])->name('login-admin');

Route::get('/admin/peta', function() {
    $desa = Desa::find(request('desa'));
    return view('admin.peta', [
        'desa' => $desa
    ]);
});
Route::post('/admin/peta/ubah', function(Request $request) {
    $desa = Desa::find(request('desa'));
    $longitude = $request->input('lokasi-longitude');
    $latitude = $request->input('lokasi-latitude');

    $desa->lokasi = $longitude . ',' . $latitude;
    $desa->save();

    return back();
});

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