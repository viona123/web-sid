@extends('admin.template')

@section('title', 'Keluarga Detail')

@section('content')
<h3>Detail Keluarga</h3><hr>

<h5 class="mt-4 mb-3">Rincian Keluarga</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Nomor Kartu Keluarga</td>
        <td>: {{ $keluarga->Nomor_KK }}</td>
    </tr>
    <tr>
        <td width="30%">Kepala Keluarga</td>
        <td>: {{ $keluarga->kepala->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat</td>
        <td>: {{ $keluarga->Alamat }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Anggota Keluarga</h5>
<div style="overflow-x: auto">
    <table width="100%" class="table table-secondary ms-3" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Hubungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $sensus)
            <tr>
                <td>{{ $sensus->id }}</td>
                <td>
                    <a class="btn btn-warning btn-aksi" href="javascript:void(0)"><i class="fas fa-link"></i></a>
                    <a class="btn btn-danger btn-aksi" href="javascript:void(0)"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $sensus->nik }}</td>
                <td>{{ $sensus->nama }}</td>
                <td>{{ $sensus->ttl }}</td>
                <td>{{ $sensus->jenis_kelamin }}</td>
                <td>{{ $sensus->hubungan_keluarga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection