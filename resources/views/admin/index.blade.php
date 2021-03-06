@extends('admin.template')

@section('title', 'Home')

@section('content')
    <h3>SISKA</h3><hr class="bg-primary">
    <div class="row text-white ms-2">
        <div class="card bg-primary m-2 card-admin" style="width: 15rem;" onclick="javascript:document.location.href='/admin/wilayah_desa?desa={{ $desa->id }}'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="display-4">{{ $total_dusun }}</div>
                <h5 class="card-title">Wilayah Dusun</h5>
                <a href="/admin/wilayah_desa?desa={{ $desa->id }}" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
        <div class="card bg-info m-2 card-admin" style="width: 15rem;" onclick="javascript:document.location.href='/admin/penduduk?desa={{ $desa->id }}'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="display-4">{{ $total_sensus }}</div>
                <h5 class="card-title">Penduduk</h5>
                <a href="/admin/penduduk?desa={{ $desa->id }}" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
        <div class="card m-2 card-admin" style="width: 15rem; background-color: #20B2AA;" onclick="javascript:document.location.href='/admin/keluarga?desa={{ $desa->id }}'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="display-4">{{ $total_keluarga }}</div>
                <h5 class="card-title">Keluarga</h5>
                <a href="/admin/keluarga?desa={{ $desa->id }}" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
        <div class="card bg-danger m-2" style="width: 15rem;" onclick="javascript:document.location.href='#'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="display-4">5338</div>
                <h5 class="card-title">Surat Tercetak</h5>
                <a href="#" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
        <div class="card m-2 card-admin" style="width: 10em; background-color: #7D0541;" onclick="javascript:document.location.href='/admin/kelompok?desa={{ $desa->id }}'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="display-4">{{ $total_kelompok }}</div>
                <h5 class="card-title">Kelompok</h5>
                <a href="/admin/kelompok?desa={{ $desa->id }}" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
        <div class="card m-2 card-admin" style="width: 10em; background-color: #493D26;" onclick="javascript:document.location.href='/admin/rumah-tangga?desa={{ $desa->id }}'">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="display-4">{{ $total_rt }}</div>
                <h5 class="card-title">Rumah Tangga</h5>
                <a href="/admin/rumah-tangga?desa={{ $desa->id }}" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
        </div>
    </div>
@endsection
