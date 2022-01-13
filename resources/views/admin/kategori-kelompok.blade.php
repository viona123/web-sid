@extends('admin.template')

@section('title', 'Kategori Kelompok')

@section('content')
<h3>Data Kategori Kelompok</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah kategori Kelompok</button>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama Kategori</th>
	            <th>Deskripsi Kategori</th>
	        </tr>
	    </thead>
	    <tbody>
            @foreach($kategori_kelompok as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>
                    <button href="javascript:void(0)" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data kategori {{ $kategori->nama }}?')" href="/admin/kelompok/kategori/hapus?kategori={{ $kategori->id }}" class="btn btn-danger btn-aksi"><i class="fas fa-trash"></i></a>
                </td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->deskripsi }}</td>
            </tr>
            @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah data kategori Kelompok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/kategori/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_kategori" class="form-label">Deskripsi Kategori</label>
                <textarea type="text" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori"></textarea>
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