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
            <col span="1" style="width: 18rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama Program</th>
	            <th>Asal Dana</th>
	            <th>Keterangan</th>
	            <th>Sasaran</th>
	            <th>Masa Berlaku</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($semua_bantuan as $bantuan)
	        <tr>
	            <td>{{ $bantuan->id }}</td>
	            <td>
                    <a class="btn btn-primary btn-aksi" href="/admin/program-bantuan/detail?desa={{ $desa->id }}&bantuan={{ $bantuan->id }}"><i class="fas fa-list"></i></a>
	                <button onclick="edit(this)" data-fields="nama_program={{ $bantuan->nama_program }}&keterangan={{ $bantuan->keterangan }}&tanggal_mulai={{ $bantuan->tanggal_mulai }}&tanggal_akhir={{ $bantuan->tanggal_akhir }}&sasaran={{ $bantuan->sasaran }}&asal_dana={{ $bantuan->asal_dana }}&status={{ $bantuan->status }}" data-bantuan-id="{{ $bantuan->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data Program Bantuan {{ $bantuan->nama_program }}?')" class="btn btn-danger btn-aksi" href="/admin/program-bantuan/hapus?desa={{ $desa->id }}&bantuan={{ $bantuan->id }}"><i class="fas fa-trash-alt"></i></a>
	            </td>
	            <td>{{ $bantuan->nama_program }}</td>
                <td>{{ $bantuan->asal_dana }}</td>
	            <td>{{ $bantuan->keterangan }}</td>
	            <td>{{ $bantuan->sasaran }}</td>
	            <td>{{ $bantuan->tanggal_mulai }} sampai {{ $bantuan->tanggal_akhir }}</td>
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
      <form action="/admin/program-bantuan/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="sasaran" class="form-label">Sasaran</label>
                <select class="form-control" id="sasaran" name="sasaran">
                    <option value="Penduduk Perorangan">Penduduk Perorangan</option>
                    <option value="Keluarga - KK">Keluarga - KK</option>
                    <option value="Rumah Tangga">Rumah Tangga</option>
                    <option value="Kelompok">Kelompok</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_program" class="form-label">Nama Program</label>
                <input type="text" class="form-control" id="nama_program" name="nama_program" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="asal_dana" class="form-label">Asal Dana</label>
                <select class="form-control" id="asal_dana" name="asal_dana">
                    <option value="Pusat">Pusat</option>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Kab/Kota">Kab/Kota</option>
                    <option value="Dana Desa">Dana Desa</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="Aktif">Aktif</option>
                    <option value="TIdak Aktif">TIdak Aktif</option>
                </select>
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
        <h5 class="modal-title" id="ubah-data-label">Tambah data Program Bantuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/program-bantuan/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="sasaran-edit" class="form-label">Sasaran</label>
                <select class="form-control" id="sasaran-edit" name="sasaran">
                    <option value="Penduduk Perorangan">Penduduk Perorangan</option>
                    <option value="Keluarga - KK">Keluarga - KK</option>
                    <option value="Rumah Tangga">Rumah Tangga</option>
                    <option value="Kelompok">Kelompok</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_program-edit" class="form-label">Nama Program</label>
                <input type="text" class="form-control" id="nama_program-edit" name="nama_program" required>
            </div>
            <div class="mb-3">
                <label for="keterangan-edit" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan-edit" name="keterangan" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="asal_dana-edit" class="form-label">Asal Dana</label>
                <select class="form-control" id="asal_dana-edit" name="asal_dana">
                    <option value="Pusat">Pusat</option>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Kab/Kota">Kab/Kota</option>
                    <option value="Dana Desa">Dana Desa</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai-edit" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai-edit" name="tanggal_mulai" required>
                <label for="tanggal_akhir-edit" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tanggal_akhir-edit" name="tanggal_akhir" required>
            </div>
            <div class="mb-3">
                <label for="status-edit" class="form-label">Status</label>
                <select class="form-control" name="status" id="status-edit">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
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
        formUbah.action = '/admin/program-bantuan/ubah?bantuan=' + element.getAttribute('data-bantuan-id');
        const fields = element.getAttribute('data-fields').split('&');

        // console.log(fields);

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];

            console.log(fieldElem);
        }
    }
</script>
@endsection
