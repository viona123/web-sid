<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\RumahTangga;
use App\Models\Desa;
use App\Models\Sensus;

class RumahTanggaController extends Controller
{
    public function index() {
        $desa = Desa::find(request('desa'));
        $dusun = $desa->dusun;
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $semua_rt = $desa->rumahTangga;
    
        return view('admin.rumah-tangga', [
            'desa' => $desa,
            'semua_rt' => $semua_rt,
            'dusun' => $dusun
        ]);
    }

    public function tambah(Request $request) {
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
    }

    public function ubah(Request $request) {
        $rt = RumahTangga::find(request('rt_id'));
    
        $rt->no_rt = $request->input('nomor_rt');
        $rt->nik_kepala_rt = $request->input('kepala_rt');
        $rt->alamat = $request->input('alamat');
        $rt->dusun = $request->input('dusun');
        $rt->rt = $request->input('rt');
        $rt->rw = $request->input('rw');
    
        $rt->save();
    
        return back();
    }

    public function hapus() {
        $rt = RumahTangga::find(request('rt'));
        $rt->delete();
    
        return back();
    }

    public function detail() {
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
    }

    public function hapusAnggota() {
        $anggotaRT = Sensus::find(request('sensus'));
        $anggotaRT->no_rumah_tangga = 0;
        $anggotaRT->save();
    
        return back();
    }

    public function tambahAnggota(Request $request) {
        $sensus = Sensus::firstWhere('nik', $request->input('nik'));
        $sensus->no_rumah_tangga = $request->input('no_rt');
        $sensus->hubungan_keluarga = $request->input('hubungan_rt');
        $sensus->save();
    
        return back();
    }

    public function ubahAnggota(Request $request) {
        $sensus = Sensus::firstWhere('nik', $request->input('nik'));
        $sensus->hubungan_keluarga = $request->input('hubungan_rt');
        $sensus->save();
    
        return back();
    }
}
