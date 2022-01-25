<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Desa;
use App\Models\Keuangan;

class KeuanganController extends Controller
{
    function index() {
	    $desa = Desa::find(request('desa'));
	    $tahun = $desa->keuangan()->select('tahun')->distinct()->get();
	    if (!request('t') && $tahun->count() != 0) {
	        $dataKeuangan = $desa->keuangan()
	                        ->where('jenis', request('j'))
	                        ->where('tahun', $tahun[0]->tahun)
	                        ->get();
	    } else {
	        $dataKeuangan = $desa->keuangan()
	                        ->where('jenis', request('j'))
	                        ->where('tahun', request('t'))
	                        ->get();
	    }
	
	    return view('admin.keuangan', [
	        'desa' => $desa,
	        'dataKeuangan' => $dataKeuangan,
	        'tahun' => $tahun
	    ]);
	}

	function tambah(Request $request) {
	    Keuangan::create([
	        'id_desa' => request('desa'),
	        'tahun' => $request->input('tahun'),
	        'jenis' => $request->input('jenis'),
	        'kode' => $request->input('kode'),
	        'anggaran' => $request->input('anggaran'),
	        'realisasi' => $request->input('realisasi'),
	    ]);
	
	    return back();
	}
	
	function ubah(Request $request) {
	    $keuangan = Keuangan::find(request('keuangan'));
	    $keuangan->tahun = $request->input('tahun');
	    $keuangan->jenis = $request->input('jenis');
	    $keuangan->kode = $request->input('kode');
	    $keuangan->anggaran = $request->input('anggaran');
	    $keuangan->realisasi = $request->input('realisasi');
	    $keuangan->save();
	
	    return back();
	}
	
	function hapus() {
	    $keuangan = Keuangan::find(request('keuangan'));
	    $keuangan->delete();
	
	    return back();
	}
}
