@extends('admin.template')

@section('title', 'Rumah Tangga')

@section('content')
<h3>Data Rumah Tangga</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data Rumah Tangga</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button onclick="location.reload();" class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

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
            @foreach ($semua_rt as $rumah_tangga)
	        <tr>
	            <td>{{ $rumah_tangga->id }}</td>
	            <td>
                    <a class="btn btn-primary btn-aksi" href="/admin/rumah-tangga/detail?desa={{ $desa->id }}&rt={{ $rumah_tangga->id }}"><i class="fas fa-list"></i></a> 
                    <button onclick="edit(this)" data-fields="nomor-rt={{ $rumah_tangga->no_rt }}&kepala-rt={{ $rumah_tangga->nik_kepala_rt }}&alamat={{ $rumah_tangga->alamat }}&dusun={{ $rumah_tangga->dusun }}&rt={{ $rumah_tangga->rt }}&rw={{ $rumah_tangga->rw }}" data-rt-id="{{ $rumah_tangga->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data rumah tangga {{ $rumah_tangga->kepala->nama }} ?')" class="btn btn-danger btn-aksi" href="/admin/rumah-tangga/hapus?rt={{ $rumah_tangga->id }}"><i class="fas fa-trash-alt"></i></a>
                </td>
	            <td>{{ $rumah_tangga->no_rt }}</td>
	            <td>{{ $rumah_tangga->kepala->nama }}</td>
	            <td>{{ $rumah_tangga->nik_kepala_rt }}</td>
	            <td>{{ $rumah_tangga->anggota->count() }}</td>
	            <td>{{ $rumah_tangga->alamat }}</td>
	            <td>{{ $rumah_tangga->dusun }}</td>
	            <td>{{ $rumah_tangga->rw }}</td>
	            <td>{{ $rumah_tangga->rt }}</td>
	            <td>{{ $rumah_tangga->tanggal_terdaftar }}</td>
	        </tr>
            @endforeach
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
      <form action="/admin/rumah-tangga/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nomor-rt" class="form-label">Nomor Rumah Tangga</label>
                <input type="number" class="form-control" id="nomor-rt" name="nomor_rt">
            </div>
            <div class="mb-3">
                <label for="kepala-rt" class="form-label">NIK Kepala Keluarga</label>
                <input type="number" class="form-control" id="kepala-rt" name="kepala_rt">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label">Dusun</label>
                <select class="form-control" id="dusun" name="dusun">
                    @foreach($dusun as $ds)
                    <option value="{{ $ds->nama }}">{{ $ds->nama }}</option>
                    @endforeach
                </select>
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
                <label for="nomor-rt-edit" class="form-label">Nomor Rumah Tangga</label>
                <input type="number" class="form-control" id="nomor-rt-edit" name="nomor_rt">
            </div>
            <div class="mb-3">
                <label for="kepala-rt-edit" class="form-label">NIK Kepala Keluarga</label>
                <input type="number" class="form-control" id="kepala-rt-edit" name="kepala_rt">
            </div>
            <div class="mb-3">
                <label for="alamat-edit" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat-edit" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun-edit" class="form-label">Dusun</label>
                <select class="form-control" id="dusun-edit" name="dusun">
                    @foreach($dusun as $ds)
                    <option value="{{ $ds->nama }}">{{ $ds->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="rt-edit" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt-edit" name="rt">
            </div>
            <div class="mb-3">
                <label for="rw-edit" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw-edit" name="rw">
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
        formUbah.action = '/admin/rumah-tangga/ubah?rt_id=' + element.getAttribute('data-rt-id');
        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];
        }
    }
</script>
@endsection