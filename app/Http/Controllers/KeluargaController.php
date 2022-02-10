<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\Desa;
use App\Models\Sensus;
use App\Models\AnggotaKeluarga;

class KeluargaController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
	    $desa = Desa::find(request('desa'));
		$sensus = $desa->sensus;
		$keluarga = $desa->keluarga;
		$dusun = $desa->dusun;

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.keluarga.index', [
	        'keluarga' => $keluarga,
	        'desa' => $desa,
			'dusun' => $dusun,
			'sensus' => $sensus
	    ]);
	}

	public function tambah(Request $request) {
	    $nomor_kk = $request->input('nomor_kk');
	    $kepala_keluarga = trim(explode('-', $request->input('kepala_keluarga'))[1]);
	    $alamat = $request->input('alamat');
	    $dusun = $request->input('dusun');
	    $rt = $request->input('rt');
	    $rw = $request->input('rw');
	
	    Keluarga::create([
			'id_desa' => request('desa'),
	        'Nomor_KK' => $nomor_kk,
	        'kepala_keluarga' => $kepala_keluarga,
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
	    $keluarga->kepala_keluarga = trim(explode('-', $request->input('kepala_keluarga'))[1]);
	    $keluarga->NIK = trim(explode('-', $request->input('kepala_keluarga'))[1]);
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
		$sensus = $desa->sensus;

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.keluarga.detail', [
	        'keluarga' => $keluarga,
	        'anggota' => $anggota,
	        'desa' => $desa,
			'sensus' => $sensus
	    ]);
	}

	public function tambahAnggota(Request $request) {
	    $anggota_baru = AnggotaKeluarga::firstWhere('nik_anggota', trim(explode('-', $request->input('nik'))[1]) );
		$keluarga = Keluarga::firstWhere('Nomor_KK', $request->input('no_kk'));
		$anggota_baru->keluarga()->associate($keluarga);
		$anggota_baru->save();
	
	    return back();
	}

	public function hapusAnggota() {
	    $anggota = AnggotaKeluarga::find(request('anggota'));
		$anggota->no_kk = '0';
	    $anggota->save();
	
	    return back();
	}

	public function ubahAnggota(Request $request) {
	    $anggota = AnggotaKeluarga::firstWhere('nik_anggota', $request->input('nik'));
	    $anggota->hubungan_keluarga = $request->input('hubungan_keluarga');
	    $anggota->save();
	
	    return back();
	}
}
