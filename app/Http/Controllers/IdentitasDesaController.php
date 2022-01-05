<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Desa;

class IdentitasDesaController extends Controller
{
    public function index() {
        $desa = Desa::find(request('desa'));
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        return view('admin.identitas_desa', [
            'desa' => $desa
        ]);
    }

    public function ubah(Request $request) {
        $desa = Desa::find(request('desa'));
        $desa->nama = $request->input('nama');
        $desa->kode_pos = $request->input('kode_pos');
        $desa->nik_kepala = $request->input('nik_kepala');
        $desa->alamat_kantor = $request->input('alamat_kantor');
        $desa->email = $request->input('alamat_email');
        $desa->no_telp = $request->input('no_telp');
        $desa->website = $request->input('website');
        $desa->nama_camat = $request->input('nama_camat');
        $desa->nip_camat = $request->input('nip_camat');
        $desa->save();
    
        return back();
    }
}
