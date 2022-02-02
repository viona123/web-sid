<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\Desa;

class DusunController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
	    $desa = Desa::find(request('desa'));
		$sensus = $desa->sensus;
		$semua_dusun = $desa->dusun;

		if (! Gate::allows('access-admin', $desa)) {
			abort(403);
		}
	
	    return view('admin.dusun', [
	        'semua_dusun' => $semua_dusun,
	        'desa' => $desa,
			'sensus' => $sensus
	    ]);
	}

	public function tambah(Request $request) {
	    $nama = $request->input('nama-dusun');
	    $kepala = trim(explode('-', $request->input('kepala-dusun'))[1]);
		$rw = $request->input('jumlah-rw');
		$rt = $request->input('jumlah-rt');
		$kk = $request->input('jumlah-kk');
		$lp = $request->input('jumlah-lp');
		$l = $request->input('jumlah-l');
		$p = $request->input('jumlah-p');
	
	    Dusun::create([
			'id_desa' => request('desa'),
	        'nama' => $nama,
	        'kepala_dusun' => $kepala,
			'jumlah_rw' => $rw,
			'jumlah_rt' => $rt,
			'jumlah_kk' => $kk,
			'jumlah_lp' => $lp,
			'jumlah_l' => $l,
			'jumlah_p' => $p
	    ]);
	
	    return back();
	}
	
	public function hapus() {
	    $dusun_hapus = Dusun::find(request('dusun'));
	    $dusun_hapus->delete();
	
	    return back();
	}

	public function ubah(Request $request) {
	     $nama = $request->input('nama-dusun');
	     $kepala = trim(explode('-', $request->input('kepala-dusun'))[1]);
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
	}
}
