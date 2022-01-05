<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\Desa;
use App\Models\Sensus;

class KeluargaController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
	    $desa = Desa::find(request('desa'));
		$keluarga = $desa->keluarga;

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.keluarga', [
	        'keluarga' => $keluarga,
	        'desa' => $desa
	    ]);
	}

	public function tambah(Request $request) {
	    $nomor_kk = $request->input('nomor_kk');
	    $kepala_keluarga = $request->input('kepala_keluarga');
	    $jumlah_anggota = $request->input('jumlah_anggota');
	    $alamat = $request->input('alamat');
	    $dusun = $request->input('dusun');
	    $rt = $request->input('rt');
	    $rw = $request->input('rw');
	
	    Keluarga::create([
			'id_desa' => request('desa'),
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
	}

	public function hapus() {
	    $keluarga = Keluarga::find(request('keluarga'));
	    $keluarga->delete();
	
	    return back();
	}

	public function ubah(Request $request) {
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
	}

	public function detail() {
	    $keluarga = Keluarga::find(request('keluarga'));
	    $anggota = $keluarga->anggota;
	    $desa = Desa::find(request('desa'));

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.keluarga-detail', [
	        'keluarga' => $keluarga,
	        'anggota' => $anggota,
	        'desa' => $desa
	    ]);
	}

	public function tambahAnggota(Request $request) {
	    $anggota_baru = Sensus::firstWhere('nik', $request->input('nik') );
	    $anggota_baru->no_kk = $request->input('no_kk');
	    $anggota_baru->hubungan_keluarga = $request->input('hubungan_keluarga');
	    $anggota_baru->save();
	
	    return back();
	}

	public function hapusAnggota() {
	    $anggota = Sensus::find(request('sensus'));
	    $anggota->no_kk = '';
	    $anggota->save();
	
	    return back();
	}

	public function ubahAnggota(Request $request) {
	    $anggota = Sensus::firstWhere('nik', $request->input('nik'));
	    $anggota->hubungan_keluarga = $request->input('hubungan_keluarga');
	    $anggota->save();
	
	    return back();
	}
}
