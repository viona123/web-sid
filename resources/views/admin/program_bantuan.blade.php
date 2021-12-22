@extends('admin.template')

@section('title', 'Program Bantuan')

@section('content')

<h3>Data Program Bantuan</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="overflow-x: auto;">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed;">
        <colgroup>
            <col span="1" style="min-width: 2rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama Program</th>
	            <th>Keterangan</th>
	            <th>Penerima</th>
	            <th>Tanggal</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($semua_bantuan as $bantuan)
	        <tr>
	            <td>{{ $bantuan->id }}</td>
	            <td>
	                <button onclick="edit(this)" data-fields="" data-bantuan-id="{{ $bantuan->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data Program Bantuan {{ $bantuan->nama_program }}?')" class="btn btn-danger btn-aksi" href="/admin/wilayah_desa/hapus?desa={{ $desa->id }}&bantuan={{ $bantuan->id }}"><i class="fas fa-trash-alt"></i></a>
	            </td>
	            <td>{{ $bantuan->nama_program }}</td>
	            <td>{{ $bantuan->keterangan }}</td>
	            <td>{{ $bantuan->nik_penerima }}</td>
	            <td>{{ $bantuan->tanggal }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah data Program Bantuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/tambah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_program" class="form-label">Nama Program</label>
                <input type="text" class="form-control" id="nama_program" name="nama_program">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="penerima" class="form-label">Ketua Kelompok</label>
                <input type="number" class="form-control" id="penerima" name="penerima">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Penerimaan</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
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
@endsection
