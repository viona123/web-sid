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

Route::get('/admin/rumah-tangga', function() {
    $desa = Desa::find(request('desa'));

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

    $semua_rt = RumahTangga::all();

    return view('admin.rumah-tangga', [
        'desa' => $desa,
        'semua_rt' => $semua_rt
    ]);
});

Route::post('/admin/rumah-tangga/tambah', function(Request $request) {
    RumahTangga::create([
        'id_desa' => request('desa'),
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

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

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

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

	$semua_bantuan = $desa->programBantuan;

	return view('admin.program_bantuan.index', [
		'desa' => $desa,
		'semua_bantuan' => $semua_bantuan
	]);
});

Route::post('/admin/program-bantuan/tambah', function(Request $request) {
    ProgramBantuan::create([
        'id_desa' => request('desa'),
        'sasaran' => $request->input('sasaran'),
        'nama_program' => $request->input('nama_program'),
        'keterangan' => $request->input('keterangan'),
        'asal_dana' => $request->input('asal_dana'),
        'tanggal_mulai' => $request->input('tanggal_mulai'),
        'tanggal_akhir' => $request->input('tanggal_akhir'),
        'status' => $request->input('status')
    ]);

    return back();
});

Route::post('/admin/program-bantuan/ubah', function(Request $request) {
    $bantuan = ProgramBantuan::find(request('bantuan'));
    $bantuan->nama_program = $request->input('nama_program');
    $bantuan->sasaran = $request->input('sasaran');
    $bantuan->keterangan = $request->input('keterangan');
    $bantuan->tanggal_mulai = $request->input('tanggal_mulai');
    $bantuan->tanggal_akhir = $request->input('tanggal_akhir');
    $bantuan->asal_dana = $request->input('asal_dana');
    $bantuan->status = $request->input('status');
    $bantuan->save();

    return back();
});

Route::get('/admin/program-bantuan/hapus', function() {
    $bantuan = ProgramBantuan::find(request('bantuan'));
    $bantuan->delete();

    return back();
});

Route::get('/admin/program-bantuan/detail', function() {
    $bantuan = ProgramBantuan::find(request('bantuan'));
    $desa = Desa::find(request('desa'));

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

    $penerima = $bantuan->penerima;

    $view = 'admin.program_bantuan.detail_perorangan';

    if ($bantuan->sasaran == 'Keluarga - KK') {
        $view = 'admin.program_bantuan.detail_keluarga';
    } else if ($bantuan->sasaran == 'Rumah Tangga') {
        $view = 'admin.program_bantuan.detail_rt';
    } else if ($bantuan->sasaran == 'Kelompok') {
        $view = 'admin.program_bantuan.detail_kelompok';
    }

    return view($view, [
        'desa' => $desa,
        'bantuan' => $bantuan,
        'penerimaBantuan' => $penerima
    ]);
});

Route::post('/admin/program-bantuan/penerima/tambah', function(Request $request) {
    PenerimaBantuan::create([
        'id_desa' => request('desa'),
        request('fkey') => $request->input('fkey_value'),
        'bantuan_id' => request('bantuan')
    ]);

    return back();
});

Route::get('/admin/program-bantuan/penerima/hapus', function(Request $request) {
    $penerima = PenerimaBantuan::find(request('penerima'));
    $penerima->delete();

    return back();
});

Route::get('/admin/identitas_desa', function() {
    $desa = Desa::find(request('desa'));

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

    return view('admin.identitas_desa', [
        'desa' => $desa
    ]);
});

Route::post('/admin/identitas_desa/ubah', function(Request $request) {
    $desa = Desa::find(request('desa'));
    $desa->nama = $request->input('nama');
    $desa->kode_pos = $request->input('kode_pos');
    $desa->nik_kepala = $request->input('nik_kepala');
    $desa->alamat_kantor = $request->input('alamat_kantor');
    $desa->email = $request->input('alamat_email');
    $desa->no_telp = $request->input('no_telp');
    $desa->website = $request->input('website');
    $desa->nama_camat = $request->input('nama_camat');
    $desa->nip_camat = $request->input('nip_camat');
    $desa->save();

    return back();
});

Route::get('/admin/pengurus_desa', function() {
    $desa = Desa::find(request('desa'));

    if (! Gate::allows('access-admin', $desa)) {
        abort(403);
    }

    $pengurus = $desa->pengurus;

    return view('admin.pengurus_desa', [
        'desa' => $desa,
        'pengurus' => $pengurus
    ]);
});

Route::get('/admin/pengurus_desa/ubah-status', function() {
    $staff = StaffDesa::find(request('staff'));
    $staff->status = trim(request('value'));
    $staff->save();

    return back();
});

Route::get('/admin/pengurus_desa/hapus', function() {
    $staff = StaffDesa::find(request('staff'));
    $staff->delete();

    return back();
});

Route::post('/admin/pengurus_desa/tambah', function(Request $request) {
    StaffDesa::create([
        'id_desa' => request('desa'),
        'nik_staff' => $request->input('nik_pegawai'),
        'nipd' => $request->input('nipd'),
        'nip' => $request->input('nip'),
        'no_sk_pengangkatan' => $request->input('no_sk_pengangkatan'),
        'no_sk_pemberhentian' => $request->input('no_sk_pemberhentian'),
        'tanggal_sk_pengangkatan' => $request->input('tanggal_sk_pengangkatan'),
        'tanggal_sk_pemberhentian' => $request->input('tanggal_sk_pemberhentian'),
        'status' => $request->input('status'),
        'jabatan' => $request->input('jabatan'),
        'periode_jabatan' => $request->input('periode_jabatan')
    ]);

    return back();
});

Route::post('/admin/pengurus_desa/ubah', function(Request $request) {
    $staff = StaffDesa::find(request('staff'));
    $staff->nik_staff = $request->input('nik_pegawai');
    $staff->nipd = $request->input('nipd');
    $staff->nip = $request->input('nip');
    $staff->no_sk_pengangkatan = $request->input('no_sk_pengangkatan');
    $staff->no_sk_pemberhentian = $request->input('no_sk_pemberhentian');
    $staff->tanggal_sk_pengangkatan = $request->input('tanggal_sk_pengangkatan');
    $staff->tanggal_sk_pemberhentian = $request->input('tanggal_sk_pemberhentian');
    $staff->status = $request->input('status');
    $staff->jabatan = $request->input('jabatan');
    $staff->periode_jabatan = $request->input('periode_jabatan');
    $staff->save();

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
