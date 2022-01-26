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
	    $keuangan = Keuangan::where([
	    	['tahun', $request->input('tahun')],
	    	['kode', $request->input('kode')]
	    ])->first();

	    if ($keuangan) {
	    	$keuangan->anggaran += $request->input('anggaran');
	    	$keuangan->realisasi += $request->input('realisasi');
	    	$keuangan->save();
	    } else {
	    	Keuangan::create([
		        'id_desa' => request('desa'),
		        'tahun' => $request->input('tahun'),
		        'jenis' => $request->input('jenis'),
		        'kode' => $request->input('kode'),
		        'anggaran' => $request->input('anggaran'),
		        'realisasi' => $request->input('realisasi'),
		    ]);
	    }
	
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

	function laporanIndex() {
		$desa = Desa::find(request('desa'));
		$dataPendapatan = [
			'anggaran' => [
				'4.1' => array_sum($desa->keuangan()->where('kode', 'like', '%4.1%')->pluck('anggaran')->toArray()),
				'4.2' => array_sum($desa->keuangan()->where('kode', 'like', '%4.2%')->pluck('anggaran')->toArray()),
				'4.3' => array_sum($desa->keuangan()->where('kode', 'like', '%4.3%')->pluck('anggaran')->toArray()),
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '%4%')->pluck('anggaran')->toArray()),
			],
			'realisasi' => [
				'4.1' => array_sum($desa->keuangan()->where('kode', 'like', '%4.1%')->pluck('realisasi')->toArray()),
				'4.2' => array_sum($desa->keuangan()->where('kode', 'like', '%4.2%')->pluck('realisasi')->toArray()),
				'4.3' => array_sum($desa->keuangan()->where('kode', 'like', '%4.3%')->pluck('realisasi')->toArray()),
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '%4%')->pluck('realisasi')->toArray()),
			]
		];
		$dataBelanja = [
			'anggaran' => [
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '00.0000.%')->pluck('anggaran')->toArray())
			],
			'realisasi' => [
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '00.0000.%')->pluck('realisasi')->toArray())
			]
		];
		$dataPembiayaan = [
			'anggaran' => [
				'6.1' => array_sum($desa->keuangan()->where('kode', 'like', '%6.1%')->pluck('anggaran')->toArray()),
				'6.2' => array_sum($desa->keuangan()->where('kode', 'like', '%6.2%')->pluck('anggaran')->toArray()),
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '%6%')->pluck('anggaran')->toArray())
			],
			'realisasi' => [
				'6.1' => array_sum($desa->keuangan()->where('kode', 'like', '%6.1%')->pluck('realisasi')->toArray()),
				'6.2' => array_sum($desa->keuangan()->where('kode', 'like', '%6.2%')->pluck('realisasi')->toArray()),
				'total' => array_sum($desa->keuangan()->where('kode', 'like', '%6%')->pluck('realisasi')->toArray())
			]
		];

		return view('admin.laporan_keuangan', [
			'desa' => $desa,
			'dataPendapatan' => $dataPendapatan,
			'dataBelanja' => $dataBelanja,
			'dataPembiayaan' => $dataPembiayaan
		]);
	}
}