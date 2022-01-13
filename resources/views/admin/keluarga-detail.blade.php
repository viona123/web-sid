@extends('admin.template')

@section('title', 'Keluarga Detail')

@section('content')
<h3>Detail Keluarga</h3><hr>

<h5 class="mt-4 mb-3">Rincian Keluarga</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Nomor Kartu Keluarga</td>
        <td>: {{ $keluarga->Nomor_KK }}</td>
    </tr>
    <tr>
        <td width="30%">Kepala Keluarga</td>
        <td>: {{ $keluarga->kepala->nama }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat</td>
        <td>: {{ $keluarga->Alamat }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Anggota Keluarga</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Anggota Keluarga</button>
<div style="overflow-x: auto">
    <table width="100%" class="table table-secondary ms-3" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
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
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Hubungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $anggotaKeluarga)
            <tr>
                <td>{{ $anggotaKeluarga->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="nik={{ $anggotaKeluarga->sensus->nik }}&nama={{ $anggotaKeluarga->sensus->nama }}&hubungan_keluarga={{ $anggotaKeluarga->hubungan_keluarga }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-link"></i></a>
                    <a onclick="return confirm('Hapus {{ $anggotaKeluarga->sensus->nama }} dari keluarga ini?')" class="btn btn-danger btn-aksi" href="/admin/keluarga/anggota/hapus?anggota={{ $anggotaKeluarga->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $anggotaKeluarga->sensus->nik }}</td>
                <td>{{ $anggotaKeluarga->sensus->nama }}</td>
                <td>{{ $anggotaKeluarga->sensus->ttl }}</td>
                <td>{{ $anggotaKeluarga->sensus->jenis_kelamin }}</td>
                <td>{{ $anggotaKeluarga->hubungan_keluarga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Anggota Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keluarga/anggota/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" value="{{ $keluarga->Nomor_KK }}" name="no_kk">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga" class="form-label">Hubungan Dalam Keluarga</label>
                <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
                    <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                    <option value="SUAMI">SUAMI</option>
                    <option value="ISTRI">ISTRI</option>
                    <option value="ANAK">ANAK</option>
                    <option value="MENANTU">MENANTU</option>
                    <option value="CUCU">CUCU</option>
                    <option value="MERTUA">MERTUA</option>
                    <option value="FAMILI">FAMILI</option>
                    <option value="PEMBANTU">PEMBANTU</option>
                    <option value="LAINNYA">LAINNYA</option>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah Hubungan dalam Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keluarga/anggota/ubah" method="post">
      @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" id="nik-ubah" name="nik">
            <div class="mb-3">
                <label for="nama-ubah" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama-ubah" name="nama-ubah" disabled>
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga-ubah" class="form-label">Hubungan Dalam Keluarga</label>
                <select class="form-control" id="hubungan_keluarga-ubah" name="hubungan_keluarga">
                    <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                    <option value="SUAMI">SUAMI</option>
                    <option value="ISTRI">ISTRI</option>
                    <option value="ANAK">ANAK</option>
                    <option value="MENANTU">MENANTU</option>
                    <option value="CUCU">CUCU</option>
                    <option value="MERTUA">MERTUA</option>
                    <option value="FAMILI">FAMILI</option>
                    <option value="PEMBANTU">PEMBANTU</option>
                    <option value="LAINNYA">LAINNYA</option>
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
        const formUbah = document.forms[1];
        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElem = document.getElementById(field[0] + '-ubah');

            fieldElem.value = field[1];
        }
    }
</script>
@endsection
