@extends('admin.template')

@section('title', 'Rumah Tangga')

@section('content')
<h3>Data Rumah Tangga</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data Rumah Tangga</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nomor Rumah Tangga</th>
	            <th>Kepala Rumah Tangga</th>
	            <th>NIK</th>
	            <th>Jumlah Anggota</th>
	            <th>Alamat</th>
	            <th>Dusun</th>
	            <th>RW</th>
	            <th>RT</th>
                <th>Tanggal Terdaftar</th>
	        </tr>
	    </thead>
	    <tbody>
	        <tr>
	            <td>1</td>
	            <td>
                    <a class="btn btn-primary btn-aksi" href="/admin/rumah-tangga/detail"><i class="fas fa-list"></i></a> 
                    <button onclick="edit(this)" data-fields="" data-keluarga-id="" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                        <a onclick="return confirm('Hapus data keluarga ?')" class="btn btn-danger btn-aksi" href="/admin/rumah-tangga/hapus"><i class="fas fa-trash-alt"></i></a>
                </td>
	            <td>11223344</td>
	            <td>33889100</td>
	            <td>33348209502</td>
	            <td>5</td>
	            <td>gggggg</td>
	            <td>Dusun</td>
	            <td>2</td>
	            <td>5</td>
	            <td>2021-12-17</td>
	        </tr>
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Rumah Tangga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/rumah-tangga/tambah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nomor-kk" class="form-label">Nomor Rumah Tangga</label>
                <input type="number" class="form-control" id="nomor-kk" name="nomor_kk">
            </div>
            <div class="mb-3">
                <label for="kepala-keluarga" class="form-label">NIK Kepala Keluarga</label>
                <input type="number" class="form-control" id="kepala-keluarga" name="kepala_keluarga">
            </div>
            <div class="mb-3">
                <label for="jumlah-anggota" class="form-label">Jumlah Anggota</label>
                <input type="number" class="form-control" id="jumlah-anggota" name="jumlah_anggota">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label">Dusun</label>
                <input type="text" class="form-control" id="dusun" name="dusun">
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt" name="rt">
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw" name="rw">
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
        <h5 class="modal-title" id="ubah-data-label">Tambah Data Rumah Tangga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/rumah-tangga/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nomor-kk" class="form-label">Nomor Rumah Tangga</label>
                <input type="number" class="form-control" id="nomor-kk" name="nomor_kk">
            </div>
            <div class="mb-3">
                <label for="kepala-keluarga" class="form-label">NIK Kepala Keluarga</label>
                <input type="number" class="form-control" id="kepala-keluarga" name="kepala_keluarga">
            </div>
            <div class="mb-3">
                <label for="jumlah-anggota" class="form-label">Jumlah Anggota</label>
                <input type="number" class="form-control" id="jumlah-anggota" name="jumlah_anggota">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label">Dusun</label>
                <input type="text" class="form-control" id="dusun" name="dusun">
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt" name="rt">
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw" name="rw">
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