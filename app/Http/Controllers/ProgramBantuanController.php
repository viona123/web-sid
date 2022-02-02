<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\ProgramBantuan;
use App\Models\Desa;
use App\Models\PenerimaBantuan;

class ProgramBantuanController extends Controller
{
    public function index() {
        $desa = Desa::find(request('desa'));
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $semua_bantuan = $desa->programBantuan;
    
        return view('admin.program_bantuan.index', [
            'desa' => $desa,
            'semua_bantuan' => $semua_bantuan
        ]);
    }

    public function tambah(Request $request) {
        ProgramBantuan::create([
            'id_desa' => request('desa'),
            'sasaran' => $request->input('sasaran'),
            'nama_program' => $request->input('nama_program'),
            'keterangan' => $request->input('keterangan'),
            'asal_dana' => $request->input('asal_dana'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_akhir' => $request->input('tanggal_akhir'),
            'status' => $request->input('status')
        ]);
    
        return back();
    }

    public function ubah(Request $request) {
        $bantuan = ProgramBantuan::find(request('bantuan'));
        $bantuan->nama_program = $request->input('nama_program');
        $bantuan->sasaran = $request->input('sasaran');
        $bantuan->keterangan = $request->input('keterangan');
        $bantuan->tanggal_mulai = $request->input('tanggal_mulai');
        $bantuan->tanggal_akhir = $request->input('tanggal_akhir');
        $bantuan->asal_dana = $request->input('asal_dana');
        $bantuan->status = $request->input('status');
        $bantuan->save();
    
        return back();
    }

    public function hapus() {
        $bantuan = ProgramBantuan::find(request('bantuan'));
        $bantuan->delete();
    
        return back();
    }

    public function detail() {
        $bantuan = ProgramBantuan::find(request('bantuan'));
        $desa = Desa::find(request('desa'));
        $sensus = $desa->sensus;
        $keluarga = $desa->keluarga;
        $rumahTangga = $desa->rumahTangga;
        $kelompok = $desa->kelompok;
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $penerima = $bantuan->penerima;
    
        $view = 'admin.program_bantuan.detail_perorangan';
    
        if ($bantuan->sasaran == 'Keluarga - KK') {
            $view = 'admin.program_bantuan.detail_keluarga';
        } else if ($bantuan->sasaran == 'Rumah Tangga') {
            $view = 'admin.program_bantuan.detail_rt';
        } else if ($bantuan->sasaran == 'Kelompok') {
            $view = 'admin.program_bantuan.detail_kelompok';
        }
    
        return view($view, [
            'desa' => $desa,
            'bantuan' => $bantuan,
            'penerimaBantuan' => $penerima,
            'sensus' => $sensus,
            'keluarga' => $keluarga,
            'rumahTangga' => $rumahTangga,
            'kelompok' => $kelompok
        ]);
    }

    public function tambahPenerima(Request $request) {
        PenerimaBantuan::create([
            'id_desa' => request('desa'),
            request('fkey') => trim(explode('-', $request->input('fkey_value'))[1]),
            'bantuan_id' => request('bantuan')
        ]);
        
        return back();
    }

    public function hapusPenerima() {
        $penerima = PenerimaBantuan::find(request('penerima'));
        $penerima->delete();
    
        return back();
    }
}
