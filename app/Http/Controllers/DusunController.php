<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\Desa;

class DusunController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
	    $semua_dusun = Dusun::all();
	    $desa = Desa::find(request('desa'));
	
	    return view('admin.dusun', [
	        'semua_dusun' => $semua_dusun,
	        'desa' => $desa
	    ]);
	}

	public function tambah(Request $request) {
	    $nama = $request->input('nama-dusun');
	    $kepala = $request->input('kepala-dusun');
	
	    Dusun::create([
	        'nama' => $nama,
	        'kepala_dusun' => $kepala
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
	}
}
