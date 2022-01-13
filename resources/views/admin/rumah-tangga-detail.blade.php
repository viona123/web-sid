@extends('admin.template')

@section('title', 'Detail Rumah Tangga')

@section('content')
<h3>Detail Rumah Tangga</h3><hr>

<h5 class="mt-4 mb-3">Rincian Rumah Tangga</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Nomor Rumah Tangga</td>
        <td>: {{ $rumah_tangga->no_rt }}</td>
    </tr>
    <tr>
        <td width="30%">Kepala Rumah Tangga</td>
        <td>: {{ $rumah_tangga->kepala->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat</td>
        <td>: {{ $rumah_tangga->alamat }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Anggota Rumah Tangga</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Anggota Rumah Tangga</button>
<div style="overflow-x: auto" class="ms-3">
    <table width="100%" class="table table-secondary" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>No KK</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Hubungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $anggotaRT)
            <tr>
                <td>{{ $anggotaRT->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="id={{ $anggotaRT->id }}&nama={{ $anggotaRT->sensus->nama }}&hubungan_rt={{ $anggotaRT->hubungan_rt }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-link"></i></a>
                    <a onclick="return confirm('Hapus {{ $anggotaRT->sensus->nama }} dari rumah tangga ini?')" class="btn btn-danger btn-aksi" href="/admin/rumah-tangga/anggota/hapus?anggotaRT={{ $anggotaRT->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $anggotaRT->sensus->anggotaKeluarga->no_kk }}</td>
                <td>{{ $anggotaRT->sensus->nik }}</td>
                <td>{{ $anggotaRT->sensus->nama }}</td>
                <td>{{ $anggotaRT->sensus->ttl }}</td>
                <td>{{ $anggotaRT->sensus->jenis_kelamin }}</td>
                <td>{{ $anggotaRT->hubungan_rt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Anggota Rumah Tangga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/rumah-tangga/anggota/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" value="{{ $rumah_tangga->no_rt }}" name="no_rt">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="hubungan_rt" class="form-label">Hubungan Dalam Rumah Tangga</label>
                <select class="form-control" id="hubungan_rt" name="hubungan_rt">
                    <option value="KEPALA RUMAH TANGGA">KEPALA RUMAH TANGGA</option>
                    <option value="ANGGOTA">ANGGOTA</option>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah Hubungan dalam Rumah Tangga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/rumah-tangga/anggota/ubah" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" id="id-ubah" name="anggota">
            <div class="mb-3">
                <label for="nama-ubah" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama-ubah" name="nama-ubah" disabled>
            </div>
            <div class="mb-3">
                <label for="hubungan_rt-ubah" class="form-label">Hubungan Dalam Rumah Tangga</label>
                <select class="form-control" id="hubungan_rt-ubah" name="hubungan_rt">
                    <option value="KEPALA RUMAH TANGGA">KEPALA RUMAH TANGGA</option>
                    <option value="ANGGOTA">ANGGOTA</option>
                </select>
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
        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-ubah');

            fieldElem.value = field[1];
        }
    }
</script>
@endsection