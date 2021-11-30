@extends('home.template')

@section('title', 'Beranda')

@section('content')
<div class="position-relative">
    <img src="/images/bg.jpg" alt="desa" style="width: 100%">
    <div class="position-absolute text-white text-center" style="width: 60%; top: 7vw; left: 20%">
        <h1 style="font-size: 10vw;">SISKA</h1>
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
