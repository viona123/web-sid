<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginAdmin(Request $request) {
        $nama_input = $request->input('pengguna');
        $password_input = $request->input('password');

        $password = User::where('name', $nama_input)->first()->password;

        if (password_verify($password_input, $password)) {
            return redirect('/admin');
        } else {
            return redirect('/login');
        }
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