@extends('home.template')

@section('title', 'Tentang')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-evenly">
        <div class="col-md-6">
            <h1 class="mb-4 text-center">Tentang</h1>
            <div class="container">
                <p>SISKA (Sistem Informasi Desa dan Kawasan) yang bertujuan untuk memudahkan perangkat desa dan warga desa untuk mengelola dan mendukung perkembangan desa yang memuat tentang informasi data penduduk, layanan penduduk, dan informasi tentang kegiatan program desa yang berbasis aplikasi website.</p>
            </div>
        </div>
        <div class="col-md-6">
            <img src="/images/home.png" alt="image" width="100%">
        </div>
    </div>
</div>
@endsection