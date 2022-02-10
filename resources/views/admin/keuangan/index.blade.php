@extends('admin.template')

@section('title', 'Keuangan')

@section('content')
<h3>Keuangan</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data</button>
<a class="btn btn-primary m-2 {{ $dataKeuangan->count() ? '' : 'disabled' }}" href="/admin/keuangan/laporan?desa={{ $desa->id }}&t={{ $dataKeuangan->count() ? $tahun[0]->tahun : 'null' }}"><i class="fas fa-bars d-inline-block me-2"></i> Laporan Keuangan</a>

<table class="mt-3 detail col-md-6">
    <tr>
        <td width="30%">Jenis Anggaran</td>
        <td>
            <select class="form-control" id="jenis-filter" onchange="filterOnChange()">
                <option value="4.PENDAPATAN">4. PENDAPATAN</option>
                <option value="5.BELANJA" {{ request('j') === '5.BELANJA' ? 'selected' : '' }}>5. BELANJA</option>
                <option value="6.PEMBIAYAAN" {{ request('j') === '6.PEMBIAYAAN' ? 'selected' : '' }}>6. PEMBIAYAAN</option>
            </select>
        </td>
    </tr>
    <tr>
        <td width="30%">Tahun</td>
        <td>
            <select class="form-control" id="tahun-filter" onchange="filterOnChange()">
                @foreach ($tahun as $th)
                <option value="{{ $th->tahun }}" {{ request('t') == $th->tahun ? 'selected' : '' }}>{{ $th->tahun }}</option>
                @endforeach
            </select>
        </td>
    </tr>
</table>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 8rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Kode Rincian</th>
	            <th>Anggaran</th>
	            <th>Realisasi</th>
	        </tr>
	    </thead>
	    <tbody>
            @foreach($dataKeuangan as $keuangan)
            <tr>
                <td>{{ $keuangan->id }}</td>
                <td>
                    <button href="javascript:void(0)" class="btn btn-warning btn-aksi" onclick="edit(this)" data-bs-toggle="modal" data-bs-target="#ubah-data" data-keuangan-id="{{ $keuangan->id }}" data-fields="tahun={{ $keuangan->tahun }}&jenis={{ $keuangan->jenis }}&kode={{ $keuangan->kode }}&anggaran={{ $keuangan->anggaran }}&realisasi={{ $keuangan->realisasi }}"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data keuangan ini?')" href="/admin/keuangan/hapus?keuangan={{ $keuangan->id }}" class="btn btn-danger btn-aksi"><i class="fas fa-trash"></i></a>
                </td>
                <td>{{ $keuangan->kode }}</td>
                <td>{{ number_format($keuangan->anggaran, 2, ',', '.') }}</td>
                <td>{{ number_format($keuangan->realisasi, 2, ',', '.') }}</td>
            </tr>
            @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Anggaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keuangan/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Anggaran</label>
                <select class="form-control" id="jenis" name="jenis" onchange="jenisOnChange(this)" data-target-kode="#kode">
                    <option value="4.PENDAPATAN">4. PENDAPATAN</option>
                    <option value="5.BELANJA">5. BELANJA</option>
                    <option value="6.PEMBIAYAAN">6. PEMBIAYAAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Rincian</label>
                <select class="form-control" id="kode" name="kode">
                    <option value="4.1.1. Hasil Usaha Desa">4.1.1. Hasil Usaha Desa</option>
                    <option value="4.1.2. Hasil Aset Desa">4.1.2. Hasil Aset Desa</option>
                    <option value="4.1.3. Swadaya, Partisipasi dan Gotong Royong">4.1.3. Swadaya, Partisipasi dan Gotong Royong</option>
                    <option value="4.1.4. Lain-Lain Pendapatan Asli Desa">4.1.4. Lain-Lain Pendapatan Asli Desa</option>
                    <option value="4.2.1. Dana Desa">4.2.1. Dana Desa</option>
                    <option value="4.2.2. Bagi Hasil Pajak dan Retribusi">4.2.2. Bagi Hasil Pajak dan Retribusi</option>
                    <option value="4.2.3. Alokasi Dana Desa">4.2.3. Alokasi Dana Desa</option>
                    <option value="4.2.4. Bantuan Keuangan Provinsi">4.2.4. Bantuan Keuangan Provinsi</option>
                    <option value="4.2.5. Bantuan Keuangan Kabupaten/Kota">4.2.5. Bantuan Keuangan Kabupaten/Kota</option>
                    <option value="4.3.1. Penerimaan dari Hasil Kerjasama Antar Desa">4.3.1. Penerimaan dari Hasil Kerjasama Antar Desa</option>
                    <option value="4.3.2. Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga">4.3.2. Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga</option>
                    <option value="4.3.3. Penerimaan Bantuan dari Perusahaan Yang Berlokasi di Desa">4.3.3. Penerimaan Bantuan dari Perusahaan Yang Berlokasi di Desa</option>
                    <option value="4.3.4. Hibah dan Sumbangan dari Pihak Ketiga">4.3.4. Hibah dan Sumbangan dari Pihak Ketiga</option>
                    <option value="4.3.5. Koreksi Kesalahan Belanja dari Tahun-tahun Sebelumnya">4.3.5. Koreksi Kesalahan Belanja dari Tahun-tahun Sebelumnya</option>
                    <option value="4.3.6. Bunga Bank">4.3.6. Bunga Bank</option>
                    <option value="4.3.9. Lain-lain Pendapatan desa Yang Sah">4.3.9. Lain-lain Pendapatan desa Yang Sah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="anggaran" class="form-label">Nilai Anggaran</label>
                <input type="number" class="form-control" id="anggaran" name="anggaran" required>
            </div>
            <div class="mb-3">
                <label for="realisasi" class="form-label">Nilai Realisasi</label>
                <input type="number" class="form-control" id="realisasi" name="realisasi" required>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah Anggaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keuangan/ubah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="tahun-edit" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun-edit" name="tahun" required>
            </div>
            <div class="mb-3">
                <label for="jenis-edit" class="form-label">Jenis Anggaran</label>
                <select class="form-control" id="jenis-edit" name="jenis" onchange="jenisOnChange(this)" data-target-kode="#kode-edit">
                    <option value="4.PENDAPATAN">4. PENDAPATAN</option>
                    <option value="5.BELANJA">5. BELANJA</option>
                    <option value="6.PEMBIAYAAN">6. PEMBIAYAAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kode-edit" class="form-label">Kode Rincian</label>
                <select class="form-control" id="kode-edit" name="kode">
                    <option value="4.1.1. Hasil Usaha Desa">4.1.1. Hasil Usaha Desa</option>
                    <option value="4.1.2. Hasil Aset Desa">4.1.2. Hasil Aset Desa</option>
                    <option value="4.1.3. Swadaya, Partisipasi dan Gotong Royong">4.1.3. Swadaya, Partisipasi dan Gotong Royong</option>
                    <option value="4.1.4. Lain-Lain Pendapatan Asli Desa">4.1.4. Lain-Lain Pendapatan Asli Desa</option>
                    <option value="4.2.1. Dana Desa">4.2.1. Dana Desa</option>
                    <option value="4.2.2. Bagi Hasil Pajak dan Retribusi">4.2.2. Bagi Hasil Pajak dan Retribusi</option>
                    <option value="4.2.3. Alokasi Dana Desa">4.2.3. Alokasi Dana Desa</option>
                    <option value="4.2.4. Bantuan Keuangan Provinsi">4.2.4. Bantuan Keuangan Provinsi</option>
                    <option value="4.2.5. Bantuan Keuangan Kabupaten/Kota">4.2.5. Bantuan Keuangan Kabupaten/Kota</option>
                    <option value="4.3.1. Penerimaan dari Hasil Kerjasama Antar Desa">4.3.1. Penerimaan dari Hasil Kerjasama Antar Desa</option>
                    <option value="4.3.2. Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga">4.3.2. Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga</option>
                    <option value="4.3.3. Penerimaan Bantuan dari Perusahaan Yang Berlokasi di Desa">4.3.3. Penerimaan Bantuan dari Perusahaan Yang Berlokasi di Desa</option>
                    <option value="4.3.4. Hibah dan Sumbangan dari Pihak Ketiga">4.3.4. Hibah dan Sumbangan dari Pihak Ketiga</option>
                    <option value="4.3.5. Koreksi Kesalahan Belanja dari Tahun-tahun Sebelumnya">4.3.5. Koreksi Kesalahan Belanja dari Tahun-tahun Sebelumnya</option>
                    <option value="4.3.6. Bunga Bank">4.3.6. Bunga Bank</option>
                    <option value="4.3.9. Lain-lain Pendapatan desa Yang Sah">4.3.9. Lain-lain Pendapatan desa Yang Sah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="anggaran-edit" class="form-label">Nilai Anggaran</label>
                <input type="number" class="form-control" id="anggaran-edit" name="anggaran" required>
            </div>
            <div class="mb-3">
                <label for="realisasi-edit" class="form-label">Nilai Realisasi</label>
                <input type="number" class="form-control" id="realisasi-edit" name="realisasi" required>
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
    const daftarKode = {
        '4.PENDAPATAN': [
            '4.1.1. Hasil Usaha Desa',
            '4.1.2. Hasil Aset Desa',
            '4.1.3. Swadaya, Partisipasi dan Gotong Royong',
            '4.1.4. Lain-Lain Pendapatan Asli Desa',
            '4.2.1. Dana Desa',
            '4.2.2. Bagi Hasil Pajak dan Retribusi',
            '4.2.3. Alokasi Dana Desa',
            '4.2.4. Bantuan Keuangan Provinsi',
            '4.2.5. Bantuan Keuangan Kabupaten/Kota',
            '4.3.1. Penerimaan dari Hasil Kerjasama Antar Desa',
            '4.3.2. Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga',
            '4.3.3. Penerimaan Bantuan dari Perusahaan Yang Berlokasi di Desa',
            '4.3.4. Hibah dan Sumbangan dari Pihak Ketiga',
            '4.3.5. Koreksi Kesalahan Belanja dari Tahun-tahun Sebelumnya',
            '4.3.6. Bunga Bank',
            '4.3.9. Lain-lain Pendapatan desa Yang Sah'
        ],
        '5.BELANJA': [
            '00.0000.01 BIDANG PENYELENGGARAAN PEMERINTAHAN DESA',
            '00.0000.02 BIDANG PELAKSANAAN PEMBANGUNAN DESA',
            '00.0000.03 BIDANG PEMBINAAN KEMASYARAKATAN',
            '00.0000.04 BIDANG PEMBERDAYAAN MASYARAKAT',
            '00.0000.05 BIDANG PENANGGULANGAN BENCANA, DARURAT DAN MENDESAK DESA'
        ],
        '6.PEMBIAYAAN': [
            '6.1.1. SILPA Tahun Sebelumnya',
            '6.1.2. Pencairan Dana Cadangan',
            '6.1.3. Hasil Penjualan Kekayaan Desa Yang Dipisahkan',
            '6.1.9. Penerimaan Pembiayaan Lainnya',
            '6.2.1. Pembentukan Dana Cadangan',
            '6.2.2. Penyertaan Modal Desa',
            '6.2.9. Pengeluaran Pembiayaan Lainnya'
        ]
    };

    function jenisOnChange(element) {
        const kodeElement = document.querySelector(element.getAttribute('data-target-kode'));
        kodeElement.innerHTML = '';
        const jenis = element.value;
        const kode = daftarKode[jenis];

        for (let i = 0; i < kode.length; i++) {
            const option = document.createElement('option');
            option.value = kode[i];
            option.textContent = kode[i];

            kodeElement.appendChild(option);
        }
    }

    function edit(element) {
        const jenisEdit = document.getElementById('jenis-edit');

        const formUbah = document.forms[1];
        formUbah.action = '/admin/keuangan/ubah?keuangan=' + element.getAttribute('data-keuangan-id');
        const fields = element.getAttribute('data-fields').split('&');
        fields.forEach(function(field) {
            field = field.split('=');
            const fieldElem = document.getElementById(field[0] + '-edit');
            fieldElem.value = field[1];


            if (field[0] == "jenis") {
                jenisOnChange(jenisEdit);
            }
        });
    }

    function filterOnChange() {
        const jenisFilter = document.getElementById('jenis-filter');
        const tahunFilter = document.getElementById('tahun-filter');
        document.location.href = "/admin/keuangan?desa={{ $desa->id }}&j=" + jenisFilter.value + "&t=" + tahunFilter.value;
    }
</script>
@endsection