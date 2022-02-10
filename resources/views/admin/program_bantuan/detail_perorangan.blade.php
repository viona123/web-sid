@extends('admin.template')

@section('title', 'Detail Program Bantuan')

@section('content')
<h3>Program Bantuan {{ $bantuan->nama_program }}</h3><hr>

<h5 class="mt-4 mb-3">Rincian Program</h5>
<table width="100%" class="detail">
    <tr>
        <td width="30%">Nama Program</td>
        <td>: {{ $bantuan->nama_program }}</td>
    </tr>
    <tr>
        <td width="30%">Sasaran Peserta</td>
        <td>: {{ $bantuan->sasaran }}</td>
    </tr>
    <tr>
        <td width="30%">Masa Berlaku</td>
        <td>: {{ $bantuan->tanggal_mulai }} sampai {{ $bantuan->tanggal_akhir }}</td>
    </tr>
    <tr>
        <td width="30%">Keterangan</td>
        <td>: {{ $bantuan->keterangan }}</td>
    </tr>
</table>

<h5 class="mt-4">Daftar Penerima</h5>
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Penerima</button>
<div style="overflow-x: auto" class="ms-3">
    <table width="100%" class="table table-secondary" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="6" style="width: 12rem">
        </colgroup>

        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Aksi</th>
                <th rowspan="2">No. KK</th>
                <th rowspan="2">NIK</th>
                <th rowspan="2">Nama</th>
                <th colspan="6" class="text-center">Identitas di Kartu Peserta</th>
            </tr>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaBantuan as $penerima)
            <tr>
                <td>{{ $penerima->id }}</td>
                <td>
                    <a onclick="edit(this)" class="btn btn-warning btn-aksi" href="javascript:void(0)" data-fields="nik={{ $penerima->nik }}&nama={{ $penerima->nama }}&hubungan_keluarga={{ $penerima->hubungan_keluarga }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-link"></i></a>
                    <a onclick="return confirm('Hapus penerima {{ $penerima->penerimaPerorangan->nama }}?')" class="btn btn-danger btn-aksi" href="/admin/program-bantuan/penerima/hapus?penerima={{ $penerima->id }}"><i class="fas fa-times"></i></a>
                </td>
                <td>{{ $penerima->penerimaPerorangan->anggotaKeluarga->no_kk }}</td>
                <td>{{ $penerima->penerimaPerorangan->nik }}</td>
                <td>{{ $penerima->penerimaPerorangan->nama }}</td>
                <td>{{ $penerima->id }}</td>
                <td>{{ $penerima->penerimaPerorangan->nik }}</td>
                <td>{{ $penerima->penerimaPerorangan->nama }}</td>
                <td>{{ $penerima->penerimaPerorangan->ttl }}</td>
                <td>{{ $penerima->penerimaPerorangan->jenis_kelamin }}</td>
                <td>{{ $penerima->penerimaPerorangan->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Penerima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/program-bantuan/penerima/tambah?bantuan={{ $bantuan->id }}&fkey=nik_penerima&desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="fkey_value" class="form-label">Nama/NIK Penerima</label>
                <div class="suggested-input">
                    <input type="text" class="form-control" id="fkey_value" onkeyup="filter(this)" onfocus="this.value=''" data-sug-id="suggestion" name="fkey_value" autocomplete="off" required>
                    <ul class="suggestion" id="suggestion">
                        @foreach ($sensus as $penduduk)
                        <li data-nik="{{ $penduduk->nik }}">{{ $penduduk->nama }} - {{ $penduduk->nik }}</li>
                        @endforeach
                    </ul>
                </div>
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
    let sensus = [];
    function filter(element) {
        const suggestions = document.getElementById(element.getAttribute('data-sug-id'));
        suggestions.style.display = "block";
        suggestions.focus();
        if (sensus.length === 0) {
            sensus = Array.from(suggestions.querySelectorAll('li'));
        }
        const filtered = sensus.filter(function(penduduk) {
            return penduduk.textContent.toLowerCase().includes(element.value.toLowerCase());
        });

        suggestions.innerHTML = "";
        filtered.forEach(function(liElement) {
            liElement.onclick = function() {
                element.value = liElement.textContent;
                suggestions.style.display = "none";
            }
            suggestions.appendChild(liElement);
        });
    }
</script>
@endsection
