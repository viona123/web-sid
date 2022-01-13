@extends('admin.template')

@section('title', 'Pengurus Desa')

@section('content')
<h3>Pengurus Desa</h3><hr>
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Aparat Desa</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button onclick="location.reload();" class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="overflow-x: auto;">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed;">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama, NIP/NIPD, NIK</th>
	            <th>Tempat, Tanggal Lahir</th>
	            <th>Jenis Kelamin</th>
	            <th>Agama</th>
	            <th>Jabatan</th>
	            <th>Pendidikan Terakhir</th>
	            <th>No SK Pengangkatan</th>
	            <th>Tanggal SK Pengangkatan</th>
	            <th>No SK Pemberhentian</th>
	            <th>Tanggal SK Pemberhentian</th>
	            <th>Periode Jabatan</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($pengurus as $staff)
	        <tr>
	            <td>{{ $staff->id }}</td>
	            <td>
	                <button onclick="edit(this)" data-fields="nik_pegawai={{ $staff->sensus->nik }}&nipd={{ $staff->nipd }}&nip={{ $staff->nip }}&no_sk_pengangkatan={{ $staff->no_sk_pengangkatan }}&tanggal_sk_pengangkatan={{ $staff->tanggal_sk_pengangkatan }}&no_sk_pemberhentian={{ $staff->no_sk_pemberhentian }}&tanggal_sk_pemberhentian={{ $staff->tanggal_sk_pemberhentian }}&jabatan={{ $staff->jabatan }}&periode_jabatan={{ $staff->periode_jabatan }}&status={{ $staff->status }}" data-staff-id="{{ $staff->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data staff {{ $staff->sensus->nama }}?')" class="btn btn-danger btn-aksi" href="/admin/pengurus_desa/hapus?desa={{ $desa->id }}&staff={{ $staff->id }}"><i class="fas fa-trash-alt"></i></a>
	                <a href="/admin/pengurus_desa/ubah-status?staff={{ $staff->id }}&value=@if ($staff->status == 'Aktif') Tidak Aktif @else Aktif @endif" class="btn btn-dark btn-aksi"><i class="fas @if ($staff->status == 'Aktif') fa-lock-open @else fa-lock @endif"></i></a>
	            </td>
	            <td>
                    {{ $staff->sensus->nama }} <br>
                    <em>NIP: {{ $staff->nip }}</em> <br>
                    <em>NIK: {{ $staff->sensus->nik }}</em>
                </td>
	            <td>{{ $staff->sensus->ttl }}</td>
	            <td>{{ $staff->sensus->jenis_kelamin }}</td>
	            <td>{{ $staff->sensus->agama }}</td>
	            <td>{{ $staff->jabatan }}</td>
	            <td>{{ $staff->sensus->pendidikan_kk }}</td>
	            <td>{{ $staff->no_sk_pengangkatan }}</td>
	            <td>{{ $staff->tanggal_sk_pengangkatan }}</td>
	            <td>{{ $staff->no_sk_pemberhentian }}</td>
	            <td>{{ $staff->tanggal_sk_pemberhentian }}</td>
	            <td>{{ $staff->periode_jabatan }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Aparat Pemerintahan Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pengurus_desa/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nik_pegawai" class="form-label">NIK Pegawai Desa</label>
                <input type="number" class="form-control" id="nik_pegawai" name="nik_pegawai" required>
            </div>
            <div class="mb-3">
                <label for="nipd" class="form-label">NIPD</label>
                <input type="number" class="form-control" id="nipd" name="nipd">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" class="form-control" id="nip" name="nip">
            </div>
            <div class="mb-3">
                <label for="no_sk_pengangkatan" class="form-label">Nomor SK Pengangkatan</label>
                <input type="number" class="form-control" id="no_sk_pengangkatan" name="no_sk_pengangkatan" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_sk_pengangkatan" class="form-label">Tanggal SK Pengangkatan</label>
                <input type="date" class="form-control" id="tanggal_sk_pengangkatan" name="tanggal_sk_pengangkatan" required>
            </div>
            <div class="mb-3">
                <label for="no_sk_pemberhentian" class="form-label">Nomor SK Pemberhentian</label>
                <input type="number" class="form-control" id="no_sk_pemberhentian" name="no_sk_pemberhentian" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_sk_pengangkatan" class="form-label">Tanggal SK Pemberhentian</label>
                <input type="date" class="form-control" id="tanggal_sk_pengangkatan" name="tanggal_sk_pemberhentian" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="mb-3">
                <label for="periode_jabatan" class="form-label">Periode Jabatan</label>
                <input type="text" class="form-control" id="periode_jabatan" name="periode_jabatan" placeholder="Contoh: 6 Tahun Periode Pertama (2015/2021)" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Pegawai Desa</label>
                <select class="form-control" id="status" name="status">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">TIdak Aktif</option>
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
        <h5 class="modal-title" id="ubah-data-label">Tambah Aparat Pemerintahan Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pengurus_desa/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nik_pegawai-edit" class="form-label">NIK Pegawai Desa</label>
                <input type="number" class="form-control" id="nik_pegawai-edit" name="nik_pegawai" required>
            </div>
            <div class="mb-3">
                <label for="nipd-edit" class="form-label">NIPD</label>
                <input type="number" class="form-control" id="nipd-edit" name="nipd">
            </div>
            <div class="mb-3">
                <label for="nip-edit" class="form-label">NIP</label>
                <input type="number" class="form-control" id="nip-edit" name="nip">
            </div>
            <div class="mb-3">
                <label for="no_sk_pengangkatan-edit" class="form-label">Nomor SK Pengangkatan</label>
                <input type="number" class="form-control" id="no_sk_pengangkatan-edit" name="no_sk_pengangkatan" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_sk_pengangkatan-edit" class="form-label">Tanggal SK Pengangkatan</label>
                <input type="date" class="form-control" id="tanggal_sk_pengangkatan-edit" name="tanggal_sk_pengangkatan" required>
            </div>
            <div class="mb-3">
                <label for="no_sk_pemberhentian-edit" class="form-label">Nomor SK Pemberhentian</label>
                <input type="number" class="form-control" id="no_sk_pemberhentian-edit" name="no_sk_pemberhentian" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_sk_pemberhentian-edit" class="form-label">Tanggal SK Pemberhentian</label>
                <input type="date" class="form-control" id="tanggal_sk_pemberhentian-edit" name="tanggal_sk_pemberhentian" required>
            </div>
            <div class="mb-3">
                <label for="jabatan-edit" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan-edit" name="jabatan" required>
            </div>
            <div class="mb-3">
                <label for="periode_jabatan-edit" class="form-label">Periode Jabatan</label>
                <input type="text" class="form-control" id="periode_jabatan-edit" name="periode_jabatan" placeholder="Contoh: 6 Tahun Periode Pertama (2015/2021)" required>
            </div>
            <div class="mb-3">
                <label for="status-edit" class="form-label">Status Pegawai Desa</label>
                <select class="form-control" id="status-edit" name="status">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">TIdak Aktif</option>
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
        formUbah.action = '/admin/pengurus_desa/ubah?desa={{ $desa->id }}&staff=' + element.getAttribute('data-staff-id');
        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];
        }
    }
</script>
@endsection