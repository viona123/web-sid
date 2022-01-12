@extends('admin.template')

@section('title', 'Detail Pembangunan')

@section('content')
<h3>Data Dokumentasi Pembangunan</h3><hr>

<h5 class="mt-4 mb-3">Rincian Dokumentasi Pembangunan</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Nama</td>
        <td>: {{ $pembangunan->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Sumber Dana</td>
        <td>: {{ $pembangunan->sumber_dana }}</td>
    </tr>
    <tr>
        <td width="30%">Lokasi</td>
        <td>: {{ $pembangunan->lokasi }}</td>
    </tr>
    <tr>
        <td width="30%">Keterangan</td>
        <td>: {{ $pembangunan->keterangan }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Dokumentasi Pembangunan</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Data</button>
<div style="overflow-x: auto">
    <table width="100%" class="table table-secondary ms-3" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Persentase</th>
                <th>Keterangan</th>
                <th>Tanggal Rekam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumentasi as $dok)
            <tr>
                <td>{{ $dok->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-link"></i></a>
                    <a onclick="return confirm('Hapus data dokumentasi ini?')" class="btn btn-danger btn-aksi" href="/admin/pembangunan/dokumentasi/hapus?dok={{ $dok->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $dok->persentase }}</td>
                <td>{{ $dok->keterangan }}</td>
                <td>{{ $dok->tanggal_rekam }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection