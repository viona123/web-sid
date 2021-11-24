<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Penduduk;

class LoginController extends Controller
{
    public function loginAdmin(Request $request) {
        $nama_input = $request->input('pengguna');
        $password_input = $request->input('password');

        if (Auth::attempt(['name' => $nama_input, 'password' => $password_input])) {
            $request->session()->regenerate();
            $request->session()->flash('status', 'berhasil');
            return redirect()->intended('/admin');
        } else {
            $request->session()->flash('status', 'gagal');
        }

        return back();
    }

    public function loginPenduduk(Request $request) {
        $nama_input = $request->input('nama_lengkap');
        $pin_input = $request->input('pin');

        $penduduk = Penduduk::firstWhere('nama', $nama_input);
        if ($pin_input == $penduduk->pin) {
            $request->session()->flash('status', 'berhasil');
            return redirect('/profil/' . $penduduk->nik)->cookie(
                'nik', $penduduk->nik . "", 3 * 24 * 60
            );
        } else {
            $request->session()->flash('status', 'gagal');
        }

        return back();
    }

    public function loginAdminTampilan(Request $request) {
        $status = $request->session()->get('status');

        return view('login.admin', [
            "status" => $status
        ]);
    }

    public function loginPendudukTampilan(Request $request) {
        $status = $request->session()->get('status');

        return view('login.penduduk', [
            "status" => $status
        ]);
    }
}
