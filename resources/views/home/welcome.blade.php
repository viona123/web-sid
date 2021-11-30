@extends('home.template')

@section('title', 'Beranda')

@section('content')
<div class="position-relative d-flex justify-content-center align-items-center" style="background-image: url('/images/bg.jpg'); background-size: cover; min-height: 50vw">
    <div class="text-white text-center">
        <h1 style="font-size: 10vw;">
            <img style="width: 14vw; margin-right: -4vw; display: inline-block;" src="/images/logo-transparent.png" alt="siska">
            SISKA
        </h1>
        <p>Sistem Informasi Desa dan Kawasan</p>
        <div class="d-flex justify-content-center">
            <div class="dropdown me-4">
                <button class="btn btn-primary dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Masuk
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/login/admin">Admin</a></li>
                    <li><a class="dropdown-item" href="/login/penduduk">Penduduk</a></li>
                </ul>
            </div>

            <button class="btn btn-success rounded-pill">Download</button>
        </div>
    </div>
</div>
@endsection
