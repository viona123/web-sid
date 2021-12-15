<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\Desa;
use App\Models\Sensus;
use App\Models\ProgramBantuan;
use App\Models\Keluarga;
use App\Models\KategoriKelompok;
use App\Models\Kelompok;

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

    return view('admin.index', [
        'total_dusun' => $dusuns->count(),
        'total_sensus' => $sensus->count(),
        'total_keluarga' => $keluarga->count(),
        'total_kelompok' => $kelompok->count(),
        'desa' => $desa
    ]);
})->middleware('auth');
Route::get('/admin/wilayah_desa', function() {
    $semua_dusun = Dusun::all();
    $desa = Desa::find(request('desa'));

    return view('admin.dusun', [
        'semua_dusun' => $semua_dusun,
        'desa' => $desa
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
Route::get('/admin/wilayah_desa/hapus', function() {
    $dusun_hapus = Dusun::find(request('dusun'));
    $dusun_hapus->delete();

    return back();
});
Route::post('/admin/wilayah_desa/ubah', function(Request $request) {
     $nama = $request->input('nama-dusun');
     $kepala = $request->input('kepala-dusun');
     $rw = $request->input('jumlah-rw');
     $rt = $request->input('jumlah-rt');
     $kk = $request->input('jumlah-kk');
     $lp = $request->input('jumlah-lp');
     $l = $request->input('jumlah-l');
     $p = $request->input('jumlah-p');

     $dusun = Dusun::find(request('dusun'));
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
});

Route::get('/admin/penduduk', function() {
    $semua_penduduk = Sensus::all();
    $desa = Desa::find(request('desa'));

    return view('admin.penduduk', [
        'semua_penduduk' => $semua_penduduk,
        'desa' => $desa
    ]);
});

Route::post('/admin/penduduk/tambah', function(Request $request) {
    $status_dasar = $request->input('status_dasar');
    $nik = $request->input('nik');
    $no_kk = $request->input('no_kk');
    $no_kk_sebelum = $request->input('no_kk_sebelumnya');
    $nama_lengkap = $request->input('nama_lengkap');
    $nik_ayah = $request->input('nik_ayah');
    $nik_ibu = $request->input('nik_ibu');
    $hubungan_keluarga = $request->input('hubungan_keluarga');
    $jenis_kelamin = $request->input('jenis_kelamin');
    $agama = $request->input('agama');
    $status_penduduk = $request->input('status_penduduk');
    $ttl = $request->input('ttl');
    $anak_ke = $request->input('anak_ke');
    $pendidikan_kk = $request->input('pendidikan_kk');
    $pendidikan_ditempuh = $request->input('pendidikan_ditempuh');
    $no_telp = $request->input('no_telp');
    $alamat_email = $request->input('alamat_email');
    $alamat = $request->input('alamat');
    $dusun = $request->input('dusun');
    $umur = $request->input('umur');
    $pekerjaan = $request->input('pekerjaan');
    $kawin = $request->input('kawin');
    $tanggal_perkawinan = $request->input('tanggal_perkawinan');
    $now = date('Y-m-d');

    Sensus::create([
        'status_dasar' => $status_dasar,
        'nama' => $nama_lengkap,
        'nik' => $nik,
        'no_kk' => $no_kk,
        'no_kk_sebelumnya' => $no_kk_sebelum,
        'hubungan_keluarga' => $hubungan_keluarga,
        'jenis_kelamin' => $jenis_kelamin,
        'agama' => $agama,
        'status_penduduk' => $status_penduduk,
        'ttl' => $ttl,
        'umur' => $umur,
        'anak_ke' => $anak_ke,
        'pendidikan_kk' => $pendidikan_kk,
        'pendidikan_ditempuh' => $pendidikan_ditempuh,
        'pekerjaan' => $pekerjaan,
        'nik_ayah' => $nik_ayah,
        'nik_ibu' => $nik_ibu,
        'no_telp' => $no_telp,
        'alamat_email' => $alamat_email,
        'alamat' => $alamat,
        'dusun' => $dusun,
        'status_kawin' => $kawin,
        'tanggal_perkawinan' => $tanggal_perkawinan,
        'tanggal_terdaftar' => $now
    ]);

    return back();
});

Route::get('/admin/penduduk/hapus', function() {
    $sensus_hapus = Sensus::find(request('sensus'));
    $sensus_hapus->delete();

    return back();
});

Route::get('/admin/penduduk/detail', function() {
    $penduduk = Sensus::find(request('sensus'));
    $desa = Desa::find(request('desa'));
    $bantuan = ProgramBantuan::where('nik_penerima', $penduduk->nik)->get();

    return view('admin.penduduk-detail', [
        'penduduk' => $penduduk,
        'desa' => $desa,
        'bantuan' => $bantuan
    ]);
});

Route::post('/admin/penduduk/ubah', function(Request $request) {
    $penduduk = Sensus::find(request('sensus'));

    $penduduk->status_dasar = $request->input('status_dasar');
    $penduduk->nik = $request->input('nik');
    $penduduk->no_kk = $request->input('no_kk');
    $penduduk->no_kk_sebelumnya = $request->input('no_kk_sebelumnya');
    $penduduk->nama = $request->input('nama_lengkap');
    $penduduk->nik_ayah = $request->input('nik_ayah');
    $penduduk->nik_ibu = $request->input('nik_ibu');
    $penduduk->hubungan_keluarga = $request->input('hubungan_keluarga');
    $penduduk->jenis_kelamin = $request->input('jenis_kelamin');
    $penduduk->agama = $request->input('agama');
    $penduduk->status_penduduk = $request->input('status_penduduk');
    $penduduk->ttl = $request->input('ttl');
    $penduduk->anak_ke = $request->input('anak_ke');
    $penduduk->pendidikan_kk = $request->input('pendidikan_kk');
    $penduduk->pendidikan_ditempuh = $request->input('pendidikan_ditempuh');
    $penduduk->no_telp = $request->input('no_telp');
    $penduduk->alamat_email = $request->input('alamat_email');
    $penduduk->alamat = $request->input('alamat');
    $penduduk->dusun = $request->input('dusun');
    $penduduk->umur = $request->input('umur');
    $penduduk->pekerjaan = $request->input('pekerjaan');
    $penduduk->status_kawin = $request->input('kawin');
    $penduduk->tanggal_perkawinan = $request->input('tanggal_perkawinan');

    $penduduk->save();

    return back();
});

Route::get('/admin/keluarga', function() {
    $keluarga = Keluarga::all();
    $desa = Desa::find(request('desa'));

    return view('admin.keluarga', [
        'keluarga' => $keluarga,
        'desa' => $desa
    ]);
});

Route::post('/admin/keluarga/tambah', function(Request $request) {
    $nomor_kk = $request->input('nomor_kk');
    $kepala_keluarga = $request->input('kepala_keluarga');
    $jumlah_anggota = $request->input('jumlah_anggota');
    $alamat = $request->input('alamat');
    $dusun = $request->input('dusun');
    $rt = $request->input('rt');
    $rw = $request->input('rw');

    Keluarga::create([
        'Nomor_KK' => $nomor_kk,
        'kepala_keluarga' => $kepala_keluarga,
        'Jumlah_Anggota_Keluarga' => $jumlah_anggota,
        'NIK' => $kepala_keluarga,
        'Alamat' => $alamat,
        'Dusun' => $dusun,
        'RT' => $rt,
        'RW' => $rw
    ]);

    return back();
});

Route::get('/admin/keluarga/hapus', function() {
    $keluarga = Keluarga::find(request('keluarga'));
    $keluarga->delete();

    return back();
});

Route::post('/admin/keluarga/ubah', function(Request $request) {
    $keluarga = Keluarga::find(request('keluarga'));

    $keluarga->Nomor_KK = $request->input('nomor_kk');
    $keluarga->kepala_keluarga = $request->input('kepala_keluarga');
    $keluarga->NIK = $request->input('kepala_keluarga');
    $keluarga->Jumlah_Anggota_Keluarga = $request->input('jumlah_anggota');
    $keluarga->Alamat = $request->input('alamat');
    $keluarga->Dusun = $request->input('dusun');
    $keluarga->RT = $request->input('rt');
    $keluarga->RW = $request->input('rw');

    $keluarga->save();

    return back();
});

Route::get('/admin/keluarga/detail', function() {
    $keluarga = Keluarga::find(request('keluarga'));
    $anggota = $keluarga->anggota;
    $desa = Desa::find(request('desa'));

    return view('admin.keluarga-detail', [
        'keluarga' => $keluarga,
        'anggota' => $anggota,
        'desa' => $desa
    ]);
});

Route::post('/admin/keluarga/anggota/tambah', function(Request $request) {
    $anggota_baru = Sensus::firstWhere('nik', $request->input('nik') );
    $anggota_baru->no_kk = $request->input('no_kk');
    $anggota_baru->hubungan_keluarga = $request->input('hubungan_keluarga');
    $anggota_baru->save();

    return back();
});

Route::get('/admin/keluarga/anggota/hapus', function() {
    $anggota = Sensus::find(request('sensus'));
    $anggota->no_kk = '';
    $anggota->save();

    return back();
});

Route::post('/admin/keluarga/anggota/ubah', function(Request $request) {
    $anggota = Sensus::firstWhere('nik', $request->input('nik'));
    $anggota->hubungan_keluarga = $request->input('hubungan_keluarga');
    $anggota->save();

    return back();
});

Route::get('/admin/kelompok', function() {
    $desa = Desa::find(request('desa'));
    $kategori_kelompok = KategoriKelompok::all();
    $kelompok = Kelompok::all();

    return view('admin.kelompok', [
        'desa' => $desa,
        'kategori_kelompok' => $kategori_kelompok,
        'kelompoks' => $kelompok
    ]);
});

Route::post('/admin/kelompok/tambah', function(Request $request) {
    Kelompok::create([
        'nama' => $request->input('nama_kelompok'),
        'kode' => $request->input('kode_kelompok'),
        'nik_ketua' => $request->input('ketua_kelompok'),
        'kategori_id' => $request->input('kategori_kelompok'),
        'jumlah_anggota' => $request->input('jumlah_anggota'),
        'keterangan' => $request->input('deskripsi_kelompok')
    ]);

    return back();
});

Route::get('/admin/kelompok/hapus', function() {
    $kelompok = Kelompok::find(request('kelompok'));
    $kelompok->delete();

    return back();
});

Route::get('/admin/kelompok/kategori', function() {
    $desa = Desa::find(request('desa'));
    $kategori_kelompok = KategoriKelompok::all();

    return view('admin.kategori-kelompok', [
        'desa' => $desa,
        'kategori_kelompok' => $kategori_kelompok
    ]);
});

Route::post('/admin/kelompok/kategori/tambah', function(Request $request) {
    KategoriKelompok::create([
        'nama' => $request->input('nama_kategori'),
        'deskripsi' => $request->input('deskripsi_kategori')
    ]);

    return back();
});

Route::get('/admin/kelompok/kategori/hapus', function() {
    $kategori = KategoriKelompok::find(request('kategori'));
    $kategori->delete();

    return back();
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
