@extends('admin.template')

@section('title', 'Detail Kelompok')

@section('content')
<h3>Detail Kelompok</h3><hr>

<h5 class="mt-4 mb-3">Rincian Kelompok</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Kode Kelompok</td>
        <td>: {{ $kelompok->kode }}</td>
    </tr>
    <tr>
        <td width="30%">Nama Kelompok</td>
        <td>: {{ $kelompok->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Ketua Kelompok</td>
        <td>: {{ $kelompok->ketua->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Kategori</td>
        <td>: {{ $kelompok->kategori->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Keterangan</td>
        <td>: {{ $kelompok->keterangan }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Anggota Keluarga</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Anggota Kelompok</button>
<div style="overflow-x: auto">
    <table width="100%" class="table table-secondary ms-3" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Jabatan</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $anggota)
            <tr>
                <td>{{ $anggota->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="nik={{ $anggota->sensus->nik }}&jabatan={{ $anggota->jabatan }}&keterangan={{ $anggota->keterangan }}" data-anggota-id="{{ $anggota->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Hapus {{ $anggota->sensus->nama }} dari kelompok ini?')" class="btn btn-danger btn-aksi" href="/admin/kelompok/anggota/hapus?anggota={{ $anggota->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $anggota->jabatan }}</td>
                <td>{{ $anggota->sensus->nik }}</td>
                <td>{{ $anggota->sensus->nama }}</td>
                <td>{{ $anggota->sensus->ttl }}</td>
                <td>{{ $anggota->sensus->umur }}</td>
                <td>{{ $anggota->sensus->jenis_kelamin }}</td>
                <td>{{ $anggota->sensus->alamat }}</td>
                <td>{{ $anggota->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Anggota Kelompok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/anggota/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" value="{{ $kelompok->kode }}" name="kode_kelompok">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-control" id="jabatan" name="jabatan">
                    <option value="0">--PILIH JABATAN--</option>
                    <option value="KETUA">KETUA</option>
                    <option value="WAKIL KETUA">WAKIL KETUA</option>
                    <option value="SEKRETARIS">SEKRETARIS</option>
                    <option value="BENDAHARA">BENDAHARA</option>
                    <option value="ANGGOTA">ANGGOTA</option>
                </select>
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
        <h5 class="modal-title" id="ubah-data-label">Tambah Anggota Kelompok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/kelompok/anggota/ubah" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" value="{{ $kelompok->kode }}" name="kode_kelompok">
            <div class="mb-3">
                <label for="nik-edit" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik-edit" name="nik" disabled>
            </div>
            <div class="mb-3">
                <label for="jabatan-edit" class="form-label">Jabatan</label>
                <select class="form-control" id="jabatan-edit" name="jabatan">
                    <option value="0">--PILIH JABATAN--</option>
                    <option value="KETUA">KETUA</option>
                    <option value="WAKIL KETUA">WAKIL KETUA</option>
                    <option value="SEKRETARIS">SEKRETARIS</option>
                    <option value="BENDAHARA">BENDAHARA</option>
                    <option value="ANGGOTA">ANGGOTA</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan-edit" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan-edit" name="keterangan"></textarea>
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

<script>
    function edit(element) {
        const formUbah = document.forms[1];
        const id = element.getAttribute('data-anggota-id');
        formUbah.action = '/admin/kelompok/anggota/ubah?anggota=' + id;

        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];
        }
    }
</script>
@endsection