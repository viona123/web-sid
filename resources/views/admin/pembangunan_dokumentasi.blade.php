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
<div style="overflow-x: auto" class="ms-3">
    <table width="100%" class="table table-secondary" style="table-layout: fixed">
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
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="persentase={{ $dok->persentase }}&keterangan={{ $dok->keterangan }}" data-dok-id="{{ $dok->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Hapus data dokumentasi ini?')" class="btn btn-danger btn-aksi" href="/admin/pembangunan/dokumentasi/hapus?dok={{ $dok->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $dok->persentase }}%</td>
                <td>{{ $dok->keterangan }}</td>
                <td>{{ $dok->tanggal_rekam }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Dokumentasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pembangunan/dokumentasi/tambah?desa={{ $desa->id }}&pembangunan={{ $pembangunan->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="persentase" class="form-label">Persentase</label>
                <input type="number" class="form-control" id="persentase" name="persentase" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ubah-data" tabindex="-1" aria-labelledby="ubah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubah-data-label">Ubah Data Dokumentasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pembangunan/dokumentasi/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="persentase-edit" class="form-label" required>Persentase</label>
                <input type="number" class="form-control" id="persentase-edit" name="persentase" required>
            </div>
            <div class="mb-3">
                <label for="keterangan-edit" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan-edit" name="keterangan"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<script>
    function edit(element) {
        const formUbah = document.forms[1];
        formUbah.action = '/admin/pembangunan/dokumentasi/ubah?pembangunan=' + element.getAttribute('data-dok-id');
        const fields = element.getAttribute('data-fields').split('&');
        fields.forEach(function(field) {
            field = field.split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];
        })
    }
</script>
@endsection