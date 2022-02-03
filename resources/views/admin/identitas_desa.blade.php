@extends('admin.template')

@section('title', 'Identitas Desa')

@section('content')
<h3>Identitas Desa</h3><hr>

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-edit"></i> Edit Identitas Desa</button>

<table width="100%" class="mt-4 detail">
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>DESA</strong></td>
    </tr>
    <tr>
        <td width="30%">Nama Desa</td>
        <td>: {{ $desa->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Kode Wilayah</td>
        <td>: {{ $desa->kode }}</td>
    </tr>
    <tr>
        <td width="30%">Kode Pos Desa</td>
        <td>: {{ $desa->kode_pos }}</td>
    </tr>
    <tr>
        <td width="30%">Kepala Desa</td>
        <td>: {{ $desa->kepala->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat Kantor Desa</td>
        <td>: {{ $desa->alamat_kantor }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat Email Desa</td>
        <td>: {{ $desa->email }}</td>
    </tr>
    <tr>
        <td width="30%">Nomor Telepon Desa</td>
        <td>: {{ $desa->no_telp }}</td>
    </tr>
    <tr>
        <td width="30%">Website Desa</td>
        <td>: {{ $desa->website }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>KECAMATAN</strong></td>
    </tr>
    <tr>
        <td width="30%">Nama Kecamatan</td>
        <td>: {{ $desa->nama_kecamatan }}</td>
    </tr>
    <tr>
        <td width="30%">Kode Kecamatan</td>
        <td>: {{ $desa->kode_kecamatan }}</td>
    </tr>
    <tr>
        <td width="30%">Nama Camat</td>
        <td>: {{ $desa->nama_camat }}</td>
    </tr>
    <tr>
        <td width="30%">NIP Camat</td>
        <td>: {{ $desa->nip_camat }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>KABUPATEN</strong></td>
    </tr>
    <tr>
        <td width="30%">Nama Kabupaten</td>
        <td>: {{ $desa->nama_kabupaten }}</td>
    </tr>
    <tr>
        <td width="30%">Kode Kabupaten</td>
        <td>: {{ $desa->kode_kabupaten }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>PROVINSI</strong></td>
    </tr>
    <tr>
        <td width="30%">Nama Provinsi</td>
        <td>: {{ $desa->nama_provinsi }}</td>
    </tr>
    <tr>
        <td width="30%">Kode Provinsi</td>
        <td>: {{ $desa->kode_provinsi }}</td>
    </tr>
</table>

<div class="modal fade" id="ubah-data" tabindex="-1" aria-labelledby="ubah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubah-data-label">Ubah Data Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/identitas_desa/ubah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama-ubah" class="form-label">Nama Desa</label>
                <input type="text" class="form-control" id="nama-ubah" name="nama" value="{{ $desa->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos Desa</label>
                <input type="text" class="form-control" id="kode_pos-ubah" name="kode_pos" value="{{ $desa->kode_pos }}" required>
            </div>
            <div class="mb-3">
                <label for="nik_kepala" class="form-label">NIK Kepala Desa</label>
                <input type="text" class="form-control" id="nik_kepala-ubah" name="nik_kepala" value="{{ $desa->nik_kepala }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat_kantor" class="form-label">Alamat Kantor Desa</label>
                <input type="text" class="form-control" id="alamat_kantor-ubah" name="alamat_kantor" value="{{ $desa->alamat_kantor }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat_email" class="form-label">Alamat Email Desa</label>
                <input type="email" class="form-control" id="alamat_email-ubah" name="alamat_email" value="{{ $desa->email }}">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon Desa</label>
                <input type="text" class="form-control" id="no_telp-ubah" name="no_telp" value="{{ $desa->no_telp }}" required>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website Desa</label>
                <input type="text" class="form-control" id="website-ubah" name="website" value="{{ $desa->website }}">
            </div>
            <div class="mb-3">
                <label for="nama_kecamatan-ubah" class="form-label">Nama Kecamatan</label>
                <input type="text" class="form-control" id="nama_kecamatan-ubah" name="nama_kecamatan" value="{{ $desa->nama_kecamatan }}" disabled>
            </div>
            <div class="mb-3">
                <label for="kode_kecamatan-ubah" class="form-label">Kode Kecamatan</label>
                <input type="text" class="form-control" id="kode_kecamatan-ubah" name="kode_kecamatan" value="{{ $desa->kode_kecamatan }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama_camat-ubah" class="form-label">Nama Camat</label>
                <input type="text" class="form-control" id="nama_camat-ubah" name="nama_camat" value="{{ $desa->nama_camat }}" required>
            </div>
            <div class="mb-3">
                <label for="nip-ubah" class="form-label">NIP Camat</label>
                <input type="text" class="form-control" id="nip-ubah" name="nip_camat" value="{{ $desa->nip_camat }}">
            </div>
            <div class="mb-3">
                <label for="nama_kabupaten-ubah" class="form-label">Nama Kabupaten</label>
                <input type="text" class="form-control" id="nama_kabupaten-ubah" name="nama_kabupaten" value="{{ $desa->nama_kabupaten }}" disabled>
            </div>
            <div class="mb-3">
                <label for="kode_kabupaten-ubah" class="form-label">Kode Kabupaten</label>
                <input type="text" class="form-control" id="kode_kabupaten-ubah" name="kode_kabupaten" value="{{ $desa->kode_kabupaten }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama_provinsi-ubah" class="form-label">Nama Provinsi</label>
                <input type="text" class="form-control" id="nama_provinsi-ubah" name="nama_provinsi" value="{{ $desa->nama_provinsi }}" disabled>
            </div>
            <div class="mb-3">
                <label for="kode_provinsi-ubah" class="form-label">Kode Provinsi</label>
                <input type="text" class="form-control" id="kode_provinsi-ubah" name="kode_provinsi" value="{{ $desa->kode_provinsi }}" disabled>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection