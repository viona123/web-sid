<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Pembangunan;
use App\Models\DokumentasiPembangunan;

class PembangunanController extends Controller
{
    function index() {
        $desa = Desa::find(request('desa'));
        $semuaPembangunan = $desa->pembangunan;
    
        return view('admin.pembangunan', [
            'desa' => $desa,
            'semuaPembangunan' => $semuaPembangunan
        ]);
    }

    function tambah(Request $request) {
        Pembangunan::create([
            'id_desa' => request('desa'),
            'sumber_dana' => $request->input('sumber_dana'),
            'nama' => $request->input('nama_kegiatan'),
            'volume' => $request->input('volume'),
            'tahun_anggaran' => $request->input('tahun_anggaran'),
            'anggaran' => $request->input('anggaran'),
            'pelaksana' => $request->input('pelaksana'),
            'lokasi' => $request->input('lokasi'),
            'keterangan' => $request->input('keterangan')
        ]);
    
        return back();
    }

    function ubahStatus() {
        $pembangunan = Pembangunan::find(request('pembangunan'));
        $pembangunan->status = request('value');
        $pembangunan->save();
    
        return back();
    }

    function hapus() {
        $pembangunan = Pembangunan::find(request('pembangunan'));
        $pembangunan->delete();
    
        return back();
    }

    function ubah(Request $request) {
        $pembangunan = Pembangunan::find(request('pembangunan'));
        $pembangunan->sumber_dana = $request->input('sumber_dana');
        $pembangunan->nama = $request->input('nama_kegiatan');
        $pembangunan->volume = $request->input('volume');
        $pembangunan->tahun_anggaran = $request->input('tahun_anggaran');
        $pembangunan->anggaran = $request->input('anggaran');
        $pembangunan->pelaksana = $request->input('pelaksana');
        $pembangunan->lokasi = $request->input('lokasi');
        $pembangunan->keterangan = $request->input('keterangan');
        $pembangunan->save();
    
        return back();
    }

    function dokumentasiIndex() {
        $desa = Desa::find(request('desa'));
        $pembangunan = Pembangunan::find(request('pembangunan'));
        $dokumentasi = $pembangunan->dokumentasi;
    
        return view('admin.pembangunan_dokumentasi', [
            'desa' => $desa,
            'pembangunan' => $pembangunan,
            'dokumentasi' => $dokumentasi
        ]);
    }

    function dokumentasiTambah(Request $request) {
        DokumentasiPembangunan::create([
            'persentase' => $request->input('persentase'),
            'keterangan' => $request->input('keterangan'),
            'id_desa' => request('desa'),
            'id_pembangunan' => request('pembangunan'),
            'tanggal_rekam' => date('Y-m-d')
        ]);
    
        return back();
    }

    function dokumentasiUbah(Request $request) {
        $dokumentasi = DokumentasiPembangunan::find(request('pembangunan'));
        $dokumentasi->persentase = $request->input('persentase');
        $dokumentasi->keterangan = $request->input('keterangan');
        $dokumentasi->save();
    
        return back();
    }

    function dokumentasiHapus() {
        $dokumentasi = DokumentasiPembangunan::find(request('dok'));
        $dokumentasi->delete();
    
        return back();
    }
}
