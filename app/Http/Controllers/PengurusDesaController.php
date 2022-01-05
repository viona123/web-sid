<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Desa;
use App\Models\StaffDesa;

class PengurusDesaController extends Controller
{
    public function index() {
        $desa = Desa::find(request('desa'));
    
        if (! Gate::allows('access-admin', $desa)) {
            abort(403);
        }
    
        $pengurus = $desa->pengurus;
    
        return view('admin.pengurus_desa', [
            'desa' => $desa,
            'pengurus' => $pengurus
        ]);
    }

    public function ubahStatus() {
        $staff = StaffDesa::find(request('staff'));
        $staff->status = trim(request('value'));
        $staff->save();
    
        return back();
    }

    public function hapus() {
        $staff = StaffDesa::find(request('staff'));
        $staff->delete();
    
        return back();
    }

    public function tambah(Request $request) {
        StaffDesa::create([
            'id_desa' => request('desa'),
            'nik_staff' => $request->input('nik_pegawai'),
            'nipd' => $request->input('nipd'),
            'nip' => $request->input('nip'),
            'no_sk_pengangkatan' => $request->input('no_sk_pengangkatan'),
            'no_sk_pemberhentian' => $request->input('no_sk_pemberhentian'),
            'tanggal_sk_pengangkatan' => $request->input('tanggal_sk_pengangkatan'),
            'tanggal_sk_pemberhentian' => $request->input('tanggal_sk_pemberhentian'),
            'status' => $request->input('status'),
            'jabatan' => $request->input('jabatan'),
            'periode_jabatan' => $request->input('periode_jabatan')
        ]);
    
        return back();
    }

    public function ubah(Request $request) {
        $staff = StaffDesa::find(request('staff'));
        $staff->nik_staff = $request->input('nik_pegawai');
        $staff->nipd = $request->input('nipd');
        $staff->nip = $request->input('nip');
        $staff->no_sk_pengangkatan = $request->input('no_sk_pengangkatan');
        $staff->no_sk_pemberhentian = $request->input('no_sk_pemberhentian');
        $staff->tanggal_sk_pengangkatan = $request->input('tanggal_sk_pengangkatan');
        $staff->tanggal_sk_pemberhentian = $request->input('tanggal_sk_pemberhentian');
        $staff->status = $request->input('status');
        $staff->jabatan = $request->input('jabatan');
        $staff->periode_jabatan = $request->input('periode_jabatan');
        $staff->save();
    
        return back();
    }
}
