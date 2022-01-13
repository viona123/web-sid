@extends('admin.template')

@section('title', 'Program Pembangunan Desa')

@section('content')
<h3>Program Pembangunan</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data</button>

<div style="overflow-x: auto;">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed;">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 6rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 12rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama Kegiatan</th>
	            <th>Sumber Dana</th>
	            <th>Anggaran</th>
	            <th>Persentase</th>
	            <th>Volume</th>
	            <th>Tahun</th>
	            <th>Pelaksana</th>
	            <th>Lokasi</th>
	        </tr>
	    </thead>
	    <tbody>
            @php
            $fmt = new NumberFormatter( 'id_ID', NumberFormatter::CURRENCY );
            @endphp
	        @foreach($semuaPembangunan as $pembangunan)
	        <tr>
	            <td>{{ $pembangunan->id }}</td>
	            <td>
	                <button onclick="edit(this)" data-fields="sumber_dana={{ $pembangunan->sumber_dana }}&nama_kegiatan={{ $pembangunan->nama }}&anggaran={{ $pembangunan->anggaran }}&volume={{ $pembangunan->volume }}&tahun_anggaran={{ $pembangunan->tahun_anggaran }}&pelaksana={{ $pembangunan->pelaksana }}&lokasi={{ $pembangunan->lokasi }}&keterangan={{ $pembangunan->keterangan }}" data-pembangunan-id="{{ $pembangunan->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data pembangunan {{ $pembangunan->nama }}?')" class="btn btn-danger btn-aksi" href="/admin/pembangunan/hapus?desa={{ $desa->id }}&pembangunan={{ $pembangunan->id }}"><i class="fas fa-trash-alt"></i></a>
                    <a href="/admin/pembangunan/ubah-status?pembangunan={{ $pembangunan->id }}&value=@if ($pembangunan->status == 'Aktif') Tidak Aktif @else Aktif @endif" class="btn btn-dark btn-aksi"><i class="fas @if ($pembangunan->status == 'Aktif') fa-lock-open @else fa-lock @endif"></i></a>
	                <a class="btn btn-primary btn-aksi" href="/admin/pembangunan/dokumentasi?desa={{ $desa->id }}&pembangunan={{ $pembangunan->id }}"><i class="fas fa-list"></i></a> 
	            </td>
	            <td>{{ $pembangunan->nama }}</td>
	            <td>{{ $pembangunan->sumber_dana }}</td>
	            <td>{{ $fmt->formatCurrency($pembangunan->anggaran, "IDR") }}</td>
	            <td></td>
	            <td>{{ $pembangunan->volume }}</td>
	            <td>{{ $pembangunan->tahun_anggaran }}</td>
	            <td>{{ $pembangunan->pelaksana }}</td>
	            <td>{{ $pembangunan->lokasi }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah data Pembangunan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pembangunan/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="sumber_dana" class="form-label">Sumber Dana</label>
                <select class="form-control" id="sumber_dana" name="sumber_dana">
                    <option value="Pendapatan Asli Daerah">Pendapatan Asli Daerah</option>
                    <option value="Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)">Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)</option>
                    <option value="Bagian Hasil Pajak Daerah dan Retribusi Daerah Kabupaten/Kota">Bagian Hasil Pajak Daerah dan Retribusi Daerah Kabupaten/Kota</option>
                    <option value="Alokasi Dana Desa">Alokasi Dana Desa</option>
                    <option value="Bantuan Keuangan dari APBD Provinsi dan APBD Kabupaten/Kota">Bantuan Keuangan dari APBD Provinsi dan APBD Kabupaten/Kota</option>
                    <option value="Hibah dan Sumbangan yang tidak mengikat dari Pihak Ketiga">Hibah dan Sumbangan yang tidak mengikat dari Pihak Ketiga</option>
                    <option value="Lain-lain Pendapatan Desa yang sah">Lain-lain Pendapatan Desa yang sah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="volume" class="form-label">Volume</label>
                <input type="number" class="form-control" id="volume" name="volume" required>
            </div>
            <div class="mb-3">
                <label for="tahun_anggaran" class="form-label">Tahun Anggaran</label>
                <input type="number" class="form-control" id="tahun_anggaran" name="tahun_anggaran" required>
            </div>
            <div class="mb-3">
                <label for="anggaran" class="form-label">Anggaran</label>
                <input type="number" class="form-control" id="anggaran" name="anggaran" required>
            </div>
            <div class="mb-3">
                <label for="pelaksana" class="form-label">Pelaksana Kegiatan</label>
                <input type="text" class="form-control" id="pelaksana" name="pelaksana" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Kegiatan</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah data Pembangunan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pembangunan/ubah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="sumber_dana-ubah" class="form-label">Sumber Dana</label>
                <select class="form-control" id="sumber_dana-ubah" name="sumber_dana">
                    <option value="Pendapatan Asli Daerah">Pendapatan Asli Daerah</option>
                    <option value="Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)">Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)</option>
                    <option value="Bagian Hasil Pajak Daerah dan Retribusi Daerah Kabupaten/Kota">Bagian Hasil Pajak Daerah dan Retribusi Daerah Kabupaten/Kota</option>
                    <option value="Alokasi Dana Desa">Alokasi Dana Desa</option>
                    <option value="Bantuan Keuangan dari APBD Provinsi dan APBD Kabupaten/Kota">Bantuan Keuangan dari APBD Provinsi dan APBD Kabupaten/Kota</option>
                    <option value="Hibah dan Sumbangan yang tidak mengikat dari Pihak Ketiga">Hibah dan Sumbangan yang tidak mengikat dari Pihak Ketiga</option>
                    <option value="Lain-lain Pendapatan Desa yang sah">Lain-lain Pendapatan Desa yang sah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_kegiatan-ubah" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan-ubah" name="nama_kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="volume-ubah" class="form-label">Volume</label>
                <input type="number" class="form-control" id="volume-ubah" name="volume" required>
            </div>
            <div class="mb-3">
                <label for="tahun_anggaran-ubah" class="form-label">Tahun Anggaran</label>
                <input type="number" class="form-control" id="tahun_anggaran-ubah" name="tahun_anggaran" required>
            </div>
            <div class="mb-3">
                <label for="anggaran-ubah" class="form-label">Anggaran</label>
                <input type="number" class="form-control" id="anggaran-ubah" name="anggaran" required>
            </div>
            <div class="mb-3">
                <label for="pelaksana-ubah" class="form-label">Pelaksana Kegiatan</label>
                <input type="text" class="form-control" id="pelaksana-ubah" name="pelaksana" required>
            </div>
            <div class="mb-3">
                <label for="lokasi-ubah" class="form-label">Lokasi Kegiatan</label>
                <input type="text" class="form-control" id="lokasi-ubah" name="lokasi" required>
            </div>
            <div class="mb-3">
                <label for="keterangan-ubah" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan-ubah" name="keterangan"></textarea>
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
        formUbah.action = '/admin/pembangunan/ubah?desa={{ $desa->id }}&pembangunan=' + element.getAttribute('data-pembangunan-id');
        const fields = element.getAttribute('data-fields').split('&');
        fields.forEach(function(field) {
            field = field.split('=');
            const fieldElem = document.getElementById(field[0] + '-ubah');
            fieldElem.value = field[1];
        });
    }
</script>
@endsection