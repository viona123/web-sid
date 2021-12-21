<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kelompok;
use App\Models\KategoriKelompok;
use App\Models\AnggotaKelompok;

class KelompokController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
	    $desa = Desa::find(request('desa'));
	    $kategori_kelompok = KategoriKelompok::all();
	    $kelompok = Kelompok::all();
	
	    return view('admin.kelompok', [
	        'desa' => $desa,
	        'kategori_kelompok' => $kategori_kelompok,
	        'kelompoks' => $kelompok
	    ]);
	}

	public function tambah(Request $request) {
	    Kelompok::create([
	        'nama' => $request->input('nama_kelompok'),
	        'kode' => $request->input('kode_kelompok'),
	        'nik_ketua' => $request->input('ketua_kelompok'),
	        'kategori_id' => $request->input('kategori_kelompok'),
	        'keterangan' => $request->input('deskripsi_kelompok')
	    ]);
	
	    return back();
	}

	public function hapus() {
	    $kelompok = Kelompok::find(request('kelompok'));
	    $kelompok->delete();
	
	    return back();
	}

	public function ubah(Request $request) {
	    $kelompok = Kelompok::firstWhere('kode', request('kelompok'));
	    $anggotas = $kelompok->anggota;
	
	    $kelompok->nama = $request->input('nama_kelompok');
	    $kelompok->kategori_id = $request->input('kategori_kelompok');
	    $kelompok->nik_ketua = $request->input('ketua_kelompok');
	    $kelompok->kode = $request->input('kode_kelompok');
	    $kelompok->keterangan = $request->input('deskripsi_kelompok');
	
	    foreach ($anggotas as $anggota) {
	        $anggota->kode_kelompok = $request->input('kode_kelompok');
	        $anggota->save();
	    }
	
	    $kelompok->save();
	
	    return back();
	}

	public function detail() {
	    $kelompok = Kelompok::find(request('kelompok'));
	    $desa = Desa::find(request('desa'));
	    $anggota = $kelompok->anggota;
	
	    return view('admin.kelompok-detail', [
	        'desa' => $desa,
	        'kelompok' => $kelompok,
	        'anggotas' => $anggota
	    ]);
	}

	public function indexKategori() {
	    $desa = Desa::find(request('desa'));
	    $kategori_kelompok = KategoriKelompok::all();
	
	    return view('admin.kategori-kelompok', [
	        'desa' => $desa,
	        'kategori_kelompok' => $kategori_kelompok
	    ]);
	}

	public function tambahKategori(Request $request) {
	    KategoriKelompok::create([
	        'nama' => $request->input('nama_kategori'),
	        'deskripsi' => $request->input('deskripsi_kategori')
	    ]);
	
	    return back();
	}

	public function hapusKategori() {
	    $kategori = KategoriKelompok::find(request('kategori'));
	    $kategori->delete();
	
	    return back();
	}

	public function tambahAnggota(Request $request) {
	    AnggotaKelompok::create([
	        'kode_kelompok' => $request->input('kode_kelompok'),
	        'nik_anggota' => $request->input('nik'),
	        'jabatan' => $request->input('jabatan'),
	        'keterangan' => $request->input('keterangan')
	    ]);
	
	    return back();
	}

	public function hapusAnggota() {
	    $anggota = AnggotaKelompok::find(request('anggota'));
	    $anggota->delete();
	
	    return back();
	}

	public function ubahAnggota(Request $request) {
	    $anggota = AnggotaKelompok::find(request('anggota'));
	    $anggota->jabatan = $request->input('jabatan');
	    $anggota->keterangan = $request->input('keterangan');
	    $anggota->save();
	
	    return back();
	}
}
