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
        <td>: {{ $rumah_tangga->nik_kepala_rt }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat</td>
        <td>: {{ $rumah_tangga->alamat }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Anggota Rumah Tangga</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Anggota Rumah Tangga</button>
<div style="overflow-x: auto">
    <table width="100%" class="table table-secondary ms-3" style="table-layout: fixed">
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
            @foreach ($anggota as $sensus)
            <tr>
                <td>{{ $sensus->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="nik={{ $sensus->nik }}&nama={{ $sensus->nama }}&hubungan_rt={{ $sensus->hubungan_keluarga }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-link"></i></a>
                    <a onclick="return confirm('Hapus {{ $sensus->nama }} dari rumah tangga ini?')" class="btn btn-danger btn-aksi" href="/admin/rumah-tangga/anggota/hapus?sensus={{ $sensus->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $sensus->no_kk }}</td>
                <td>{{ $sensus->nik }}</td>
                <td>{{ $sensus->nama }}</td>
                <td>{{ $sensus->ttl }}</td>
                <td>{{ $sensus->jenis_kelamin }}</td>
                <td>{{ $sensus->hubungan_keluarga }}</td>
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
      <form action="/admin/rumah-tangga/anggota/tambah" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" value="{{ $rumah_tangga->no_rt }}" name="no_rt">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="hubungan_rt" class="form-label">Hubungan Dalam Rumah Tangga</label>
                <input type="text" class="form-control" id="hubungan_rt" name="hubungan_rt">
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
            <input type="hidden" class="form-control" id="nik-ubah" name="nik">
            <div class="mb-3">
                <label for="nama-ubah" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama-ubah" name="nama-ubah" disabled>
            </div>
            <div class="mb-3">
                <label for="hubungan_rt" class="form-label">Hubungan Dalam Rumah Tangga</label>
                <input type="text" class="form-control" id="hubungan_rt-ubah" name="hubungan_rt">
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