@extends('admin.template')

@section('title', 'Kelompok')

@section('content')
<h3>Data Kelompok</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Kelompok</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button class="btn btn-warning m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>
<a href="/admin/kelompok/kategori?desa={{ $desa->id }}" class="btn btn-primary m-2"><i class="fas fa-list d-inline-block me-2"></i> Kelola Kategori Kelompok</a>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Kode Kelompok</th>
	            <th>Nama Kelompok</th>
	            <th>Ketua Kelompok</th>
	            <th>Kategori Kelompok</th>
	            <th>Jumlah Anggota</th>
	        </tr>
	    </thead>
	    <tbody>
            @foreach($kelompoks as $kelompok)
            <tr>
                <td>{{ $kelompok->id }}</td>
                <td>
                    <a href="/admin/kelompok/detail?desa={{ $desa->id }}&kelompok={{ $kelompok->id }}" class="btn btn-primary btn-aksi"><i class="fas fa-list"></i></a>
                    <button onclick="edit(this)" data-fields="kode_kelompok={{ $kelompok->kode }}&nama_kelompok={{ $kelompok->nama }}&kategori_kelompok={{ $kelompok->kategori_id }}&ketua_kelompok={{ $kelompok->nik_ketua }}&deskripsi_kelompok={{ $kelompok->keterangan }}" data-kode-kelompok="{{ $kelompok->kode }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data kelompok {{ $kelompok->nama }}?')" href="/admin/kelompok/hapus?kelompok={{ $kelompok->id }}" class="btn btn-danger btn-aksi"><i class="fas fa-trash"></i></a>
                </td>
                <td>{{ $kelompok->kode }}</td>
                <td>{{ $kelompok->nama }}</td>
                <td>{{ $kelompok->ketua->nama }}</td>
                <td>{{ $kelompok->kategori->nama }}</td>
                <td>{{ $kelompok->anggota->count() }}</td>
            </tr>
            @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah data Kelompok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/tambah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_kelompok" class="form-label">Nama Kelompok</label>
                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok">
            </div>
            <div class="mb-3">
                <label for="kode_kelompok" class="form-label">Kode Kelompok</label>
                <input type="number" class="form-control" id="kode_kelompok" name="kode_kelompok">
            </div>
            <div class="mb-3">
                <label for="kategori_kelompok" class="form-label">Kategori Kelompok</label>
                <select name="kategori_kelompok" class="form-control" id="kategori_kelompok">
                @foreach ($kategori_kelompok as $kategori)
                    <option value="0">--PILIH KATEGORI--</option>
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ketua_kelompok" class="form-label">Ketua Kelompok</label>
                <input type="text" class="form-control" id="ketua_kelompok" name="ketua_kelompok">
            </div>
            <div class="mb-3">
                <label for="deskripsi_kelompok" class="form-label">Deskripsi Kelompok</label>
                <textarea type="text" class="form-control" id="deskripsi_kelompok" name="deskripsi_kelompok"></textarea>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah data Kelompok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_kelompok-edit" class="form-label">Nama Kelompok</label>
                <input type="text" class="form-control" id="nama_kelompok-edit" name="nama_kelompok">
            </div>
            <div class="mb-3">
                <label for="kode_kelompok-edit" class="form-label">Kode Kelompok</label>
                <input type="number" class="form-control" id="kode_kelompok-edit" name="kode_kelompok">
            </div>
            <div class="mb-3">
                <label for="kategori_kelompok-edit" class="form-label">Kategori Kelompok</label>
                <select name="kategori_kelompok" class="form-control" id="kategori_kelompok-edit">
                    <option value="0">--PILIH KATEGORI--</option>
                @foreach ($kategori_kelompok as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ketua_kelompok-edit" class="form-label">Ketua Kelompok</label>
                <input type="text" class="form-control" id="ketua_kelompok-edit" name="ketua_kelompok">
            </div>
            <div class="mb-3">
                <label for="deskripsi_kelompok-edit" class="form-label">Deskripsi Kelompok</label>
                <textarea type="text" class="form-control" id="deskripsi_kelompok-edit" name="deskripsi_kelompok"></textarea>
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
        formUbah.action = '/admin/kelompok/ubah?kelompok=' + element.getAttribute('data-kode-kelompok');
        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];
        }
    }
</script>
@endsection