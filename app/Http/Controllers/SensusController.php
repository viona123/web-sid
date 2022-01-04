<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\Sensus;
use App\Models\Desa;
use App\Models\ProgramBantuan;

class SensusController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	
	public function index() {
	    $desa = Desa::find(request('desa'));
		$semua_penduduk = $desa->sensus;

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.penduduk', [
	        'semua_penduduk' => $semua_penduduk,
	        'desa' => $desa
	    ]);
	}

	public function tambah(Request $request) {
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
			'id_desa' => request('desa'),
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
	}

	public function hapus() {
	    $sensus_hapus = Sensus::find(request('sensus'));
	    $sensus_hapus->delete();
	
	    return back();
	}

	public function detail() {
	    $penduduk = Sensus::find(request('sensus'));
	    $desa = Desa::find(request('desa'));

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}

	    $bantuan = $penduduk->bantuan;
	
	    return view('admin.penduduk-detail', [
	        'penduduk' => $penduduk,
	        'desa' => $desa,
	        'bantuan' => $bantuan
	    ]);
	}

	public function ubah(Request $request) {
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
	}
}
