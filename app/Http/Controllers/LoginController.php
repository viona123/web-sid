<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAdmin(Request $request) {
        $nama_input = $request->input('pengguna');
        $password_input = $request->input('password');

        if (Auth::attempt(['name' => $nama_input, 'password' => $password_input])) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back();
    }

    public function loginPenduduk(Request $request) {
        $nik_input = $request->input('nik');
        $pin_input = $request->input('pin');

        dd($nik_input);
        dd($pin_input);
    }

    public function loginAdminTampilan() {
        return view('login.admin');
    }

    public function loginPendudukTampilan() {
        return view('login.penduduk');
    }
}
