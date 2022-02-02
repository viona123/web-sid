<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\RumahTangga;
use App\Models\AnggotaRumahTangga;
use App\Models\Desa;
use App\Models\Sensus;

class RumahTanggaController extends Controller
{
    public function index() {
        $desa = Desa::find(request('desa'));
        $dusun = $desa->dusun;
        $sensus = $desa->sensus;
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $semua_rt = $desa->rumahTangga;
    
        return view('admin.rumah-tangga', [
            'desa' => $desa,
            'semua_rt' => $semua_rt,
            'dusun' => $dusun,
            'sensus' => $sensus
        ]);
    }

    public function tambah(Request $request) {
        RumahTangga::create([
            'id_desa' => request('desa'),
            'no_rt' => $request->input('nomor_rt'),
            'nik_kepala_rt' => trim(explode('-', $request->input('kepala_rt'))[1]),
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
        $rt->nik_kepala_rt = trim(explode('-', $request->input('kepala_rt'))[1]);
        $rt->alamat = $request->input('alamat');
        $rt->dusun = $request->input('dusun');
        $rt->rt = $request->input('rt');
        $rt->rw = $request->input('rw');
    
        $rt->save();
    
        return back();
    }

    public function hapus() {
        $rt = RumahTangga::find(request('rt'));
        foreach ($rt->anggota as $anggota) {
            $anggota->delete();
        }
        $rt->delete();
    
        return back();
    }

    public function detail() {
        $rt = RumahTangga::find(request('rt'));
        $desa = Desa::find(request('desa'));
        $sensus = $desa->sensus;
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $anggota = $rt->anggota;
    
        return view('admin.rumah-tangga-detail', [
            'rumah_tangga' => $rt,
            'desa' => $desa,
            'anggota' => $anggota,
            'sensus' => $sensus
        ]);
    }

    public function hapusAnggota() {
        $anggotaRT = AnggotaRumahTangga::find(request('anggotaRT'));
        $anggotaRT->delete();
    
        return back();
    }

    public function tambahAnggota(Request $request) {
        AnggotaRumahTangga::create([
            'id_desa' => request('desa'),
            'no_rt' => request('no_rt'),
            'hubungan_rt' => request('hubungan_rt'),
            'nik_anggota' => trim(explode('-', $request->input('nik'))[1])
        ]);
    
        return back();
    }

    public function ubahAnggota(Request $request) {
        $sensus = AnggotaRumahTangga::find($request->input('anggota'));
        $sensus->hubungan_rt = $request->input('hubungan_rt');
        $sensus->save();
    
        return back();
    }
}
