@extends('admin.template')

@section('title', 'Penduduk')

@section('content')

<h3>Data Penduduk</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data Penduduk</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button onclick="location.reload();" class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="width: auto; overflow: scroll; height: 70vh" class="mt-4">
    <table class="table table-secondary table-stripped" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 2rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 5rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 10rem">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>No. KK</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>Pendidikan Dalam KK</th>
                <th>Umur</th>
                <th>Pekerjaan</th>
                <th>Kawin</th>
                <th>Tgl Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semua_penduduk as $penduduk)
            <tr>
                <td>{{ $penduduk->id }}</td>
                <td>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-primary dropdown-toggle btn-aksi" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-arrow-circle-down d-inline-block me-2"></i> Pilih Aksi</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/admin/penduduk/detail?desa={{ $desa->id }}&sensus={{ $penduduk->id }}"><i class="fas fa-th-list d-inline-block me-2"></i> Lihat detail Biodata Penduduk</a></li>
                            <li><a onclick="edit(this)" class="dropdown-item" data-fields="status_dasar={{ $penduduk->status_dasar }}&nik={{ $penduduk->nik }}&no_kk={{ $penduduk->anggotaKeluarga->no_kk }}&no_kk_sebelumnya={{ $penduduk->anggotaKeluarga->no_kk_sebelumnya }}&nama_lengkap={{ $penduduk->nama }}&nik_ayah={{ $penduduk->anggotaKeluarga->nik_ayah }}&nik_ibu={{ $penduduk->anggotaKeluarga->nik_ibu }}&hubungan_keluarga={{ $penduduk->anggotaKeluarga->hubungan_keluarga }}&jenis_kelamin={{ $penduduk->jenis_kelamin }}&agama={{ $penduduk->agama }}&status_penduduk={{ $penduduk->status_penduduk }}&ttl={{ $penduduk->ttl }}&anak_ke={{ $penduduk->anggotaKeluarga->anak_ke }}&pendidikan_kk={{ $penduduk->anggotaKeluarga->pendidikan }}&pendidikan_ditempuh={{ $penduduk->pendidikan_ditempuh }}&no_telp={{ $penduduk->no_telp }}&alamat_email={{ $penduduk->alamat_email }}&alamat={{ $penduduk->alamat }}&dusun={{ $penduduk->dusun }}&umur={{ $penduduk->umur }}&pekerjaan={{ $penduduk->pekerjaan }}&kawin={{ $penduduk->anggotaKeluarga->status_kawin }}&tanggal_perkawinan={{ $penduduk->anggotaKeluarga->tanggal_perkawinan }}" data-sensus-id="{{ $penduduk->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-edit d-inline-block me-2"></i> Ubah Biodata</a></li>
                            <li><a onclick="return confirm('Hapus data sensus {{ $penduduk->nama }}?')" class="dropdown-item" href="/admin/penduduk/hapus?sensus={{ $penduduk->id }}&desa={{ $desa->id }}"><i class="fas fa-trash d-inline-block me-2"></i> Hapus</a></li>
                        </ul>
                    </div>
                </td>
                <td>
                    <img src="/images/avatar-male.png" alt="info" style="width: 2rem">
                </td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->anggotaKeluarga->no_kk }}</td>
                <td>{{ $penduduk->anggotaKeluarga->nik_ayah }}</td>
                <td>{{ $penduduk->anggotaKeluarga->nik_ibu }}</td>
                <td>{{ $penduduk->alamat }}</td>
                <td>{{ $penduduk->dusun }}</td>
                <td>{{ $penduduk->anggotaKeluarga->pendidikan }}</td>
                <td>{{ $penduduk->umur }}</td>
                <td>{{ $penduduk->pekerjaan }}</td>
                <td>{{ $penduduk->anggotaKeluarga->status_kawin}}</td>
                <td>{{ $penduduk->tanggal_terdaftar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Penduduk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/penduduk/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="status_dasar" class="form-label">Status Dasar</label>
                <select name="status_dasar" id="status_dasar" class="form-select">
                    <option value="HIDUP">Hidup</option>
                    <option value="MATI">Mati</option>
                    <option value="PINDAH">Pindah</option>
                    <option value="HILANG">Hilang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="no_kk" name="no_kk" value="0" required>
            </div>
            <div class="mb-3">
                <label for="no_kk_sebelumnya" class="form-label">Nomor Kartu Keluarga Sebelumnya</label>
                <input type="number" class="form-control" id="no_kk_sebelumnya" name="no_kk_sebelumnya" value="0" required>
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="nik_ayah" class="form-label">NIK Ayah</label>
                <input type="number" class="form-control" id="nik_ayah" name="nik_ayah" value="0" required>
            </div>
            <div class="mb-3">
                <label for="nik_ibu" class="form-label">NIK Ibu</label>
                <input type="number" class="form-control" id="nik_ibu" name="nik_ibu" value="0" required>
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
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                    <option value="L">LAKI-LAKI</option>
                    <option value="P">PEREMPUAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select name="agama" id="agama" class="form-select">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Khonghucu">Khonghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status_penduduk">Status Penduduk</label>
                <select name="status_penduduk" id="status_penduduk" class="form-select">
                    <option value="TETAP">Tetap</option>
                    <option value="TIDAK TETAP">Tidak Tetap</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" class="form" for="ttl">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Contoh: Banyumas, 15-10-2006" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="anak_ke">Kelahiran Anak Ke</label>
                <input type="number" class="form-control" name="anak_ke" id="anak_ke" value="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_kk">Pendidikan Dalam KK</label>
                <select class="form-control" name="pendidikan_kk" id="pendidikan_kk">
                    <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                    <option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
                    <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                    <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                    <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                    <option value="AKADEMI/DIPLOMA III/S. MUDA">AKADEMI/DIPLOMA III/S. MUDA</option>
                    <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
                    <option value="STRATA II">STRATA II</option>
                    <option value="STRATA III">STRATA III</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_ditempuh">Pendidikan yang sedang ditempuh</label>
                <select class="form-control" name="pendidikan_ditempuh" id="pendidikan_ditempuh">
                    <option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK TK/KELOMPOK BERMAIN</option>
                    <option value="SEDANG TK/KELOMPOK BERMAIN">SEDANG TK/KELOMPOK BERMAIN</option>
                    <option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH</option>
                    <option value="SEDANG SD/SEDERAJAT">SEDANG SD/SEDERAJAT</option>
                    <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
                    <option value="SEDANG SLTP/SEDERAJAT">SEDANG SLTP/SEDERAJAT</option>
                    <option value="SEDANG SLTA/SEDERAJAT">SEDANG SLTA/SEDERAJAT</option>
                    <option value="SEDANG D-1/SEDERAJAT">SEDANG D-1/SEDERAJAT</option>
                    <option value="SEDANG D-2/SEDERAJAT">SEDANG D-2/SEDERAJAT</option>
                    <option value="SEDANG D-3/SEDERAJAT">SEDANG D-3/SEDERAJAT</option>
                    <option value="SEDANG S-1/SEDERAJAT">SEDANG S-1/SEDERAJAT</option>
                    <option value="SEDANG S-2/SEDERAJAT">SEDANG S-2/SEDERAJAT</option>
                    <option value="SEDANG S-3/SEDERAJAT">SEDANG S-3/SEDERAJAT</option>
                    <option value="SEDANG SLB A/SEDERAJAT">SEDANG SLB A/SEDERAJAT</option>
                    <option value="SEDANG SLB B/SEDERAJAT">SEDANG SLB B/SEDERAJAT</option>
                    <option value="SEDANG SLB C/SEDERAJAT">SEDANG SLB C/SEDERAJAT</option>
                    <option value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB</option>
                    <option value="TIDAK SEDANG SEKOLAH">TIDAK SEDANG SEKOLAH</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_telp">Nomor Telepon</label>
                <input type="tel" class="form-control" name="no_telp" id="no_telp" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_email">Alamat Email</label>
                <input type="email" class="form-control" name="alamat_email" id="alamat_email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
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
                <label for="umur" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" required>
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
            </div>
            <div class="mb-3">
                <label for="kawin" class="form-label">Status Perkawinan</label>
                <select class="form-control" id="kawin" name="kawin">
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                    <option value="KAWIN">KAWIN</option>
                    <option value="CERAI HIDUP">CERAI HIDUP</option>
                    <option value="CERAI MATI">CERAI MATI</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_perkawinan">Tanggal Perkawinan</label>
                <input type="date" class="form-control" name="tanggal_perkawinan" id="tanggal_perkawinan">
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

<div class="modal fade" id="ubah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubah-data-label">Ubah Data Penduduk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/{{ $desa->id }}/penduduk/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="status_dasar_edit" class="form-label">Status Dasar</label>
                <select name="status_dasar" id="status_dasar_edit" class="form-select">
                    <option value="HIDUP">Hidup</option>
                    <option value="MATI">Mati</option>
                    <option value="PINDAH">Pindah</option>
                    <option value="HILANG">Hilang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nik_edit" class="form-label">Nomor Induk Kependudukan</label>
                <input type="number" class="form-control" id="nik_edit" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="no_kk_edit" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="no_kk_edit" name="no_kk" required>
            </div>
            <div class="mb-3">
                <label for="no_kk_sebelumnya_edit" class="form-label">Nomor Kartu Keluarga Sebelumnya</label>
                <input type="number" class="form-control" id="no_kk_sebelumnya_edit" name="no_kk_sebelumnya" required>
            </div>
            <div class="mb-3">
                <label for="nama_lengkap_edit" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap_edit" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="nik_ayah_edit" class="form-label">NIK Ayah</label>
                <input type="number" class="form-control" id="nik_ayah_edit" name="nik_ayah" value="0" required>
            </div>
            <div class="mb-3">
                <label for="nik_ibu_edit" class="form-label">NIK Ibu</label>
                <input type="number" class="form-control" id="nik_ibu_edit" name="nik_ibu" value="0" required>
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga_edit" class="form-label">Hubungan Dalam Keluarga</label>
                <select class="form-control" id="hubungan_keluarga_edit" name="hubungan_keluarga">
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
            <div class="mb-3">
                <label for="jenis_kelamin_edit" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin_edit" class="form-select">
                    <option value="L">LAKI-LAKI</option>
                    <option value="P">PEREMPUAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="agama_edit" class="form-label">Agama</label>
                <select name="agama" id="agama_edit" class="form-select">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Khonghucu">Khonghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status_penduduk_edit">Status Penduduk</label>
                <select name="status_penduduk" id="status_penduduk_edit" class="form-select">
                    <option value="TETAP">Tetap</option>
                    <option value="TIDAK TETAP">Tidak Tetap</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" class="form" for="ttl_edit">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" name="ttl" id="ttl_edit" placeholder="Contoh: Banyumas, 15-10-2006" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="anak_ke_edit">Kelahiran Anak Ke</label>
                <input type="number" class="form-control" name="anak_ke" id="anak_ke_edit" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_kk_edit">Pendidikan Dalam KK</label>
                <select class="form-control" name="pendidikan_kk" id="pendidikan_kk_edit">
                    <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                    <option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
                    <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                    <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                    <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                    <option value="AKADEMI/DIPLOMA III/S. MUDA">AKADEMI/DIPLOMA III/S. MUDA</option>
                    <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
                    <option value="STRATA II">STRATA II</option>
                    <option value="STRATA III">STRATA III</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_ditempuh_edit">Pendidikan yang sedang ditempuh</label>
                <select class="form-control" name="pendidikan_ditempuh" id="pendidikan_ditempuh_edit">
                    <option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK TK/KELOMPOK BERMAIN</option>
                    <option value="SEDANG TK/KELOMPOK BERMAIN">SEDANG TK/KELOMPOK BERMAIN</option>
                    <option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH</option>
                    <option value="SEDANG SD/SEDERAJAT">SEDANG SD/SEDERAJAT</option>
                    <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
                    <option value="SEDANG SLTP/SEDERAJAT">SEDANG SLTP/SEDERAJAT</option>
                    <option value="SEDANG SLTA/SEDERAJAT">SEDANG SLTA/SEDERAJAT</option>
                    <option value="SEDANG D-1/SEDERAJAT">SEDANG D-1/SEDERAJAT</option>
                    <option value="SEDANG D-2/SEDERAJAT">SEDANG D-2/SEDERAJAT</option>
                    <option value="SEDANG D-3/SEDERAJAT">SEDANG D-3/SEDERAJAT</option>
                    <option value="SEDANG S-1/SEDERAJAT">SEDANG S-1/SEDERAJAT</option>
                    <option value="SEDANG S-2/SEDERAJAT">SEDANG S-2/SEDERAJAT</option>
                    <option value="SEDANG S-3/SEDERAJAT">SEDANG S-3/SEDERAJAT</option>
                    <option value="SEDANG SLB A/SEDERAJAT">SEDANG SLB A/SEDERAJAT</option>
                    <option value="SEDANG SLB B/SEDERAJAT">SEDANG SLB B/SEDERAJAT</option>
                    <option value="SEDANG SLB C/SEDERAJAT">SEDANG SLB C/SEDERAJAT</option>
                    <option value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB</option>
                    <option value="TIDAK SEDANG SEKOLAH">TIDAK SEDANG SEKOLAH</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_telp_edit">Nomor Telepon</label>
                <input type="tel" class="form-control" name="no_telp" id="no_telp_edit" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_email_edit">Alamat Email</label>
                <input type="email" class="form-control" name="alamat_email" id="alamat_email_edit" required>
            </div>
            <div class="mb-3">
                <label for="alamat_edit" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_edit" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="dusun_edit" class="form-label">Dusun</label>
                <select class="form-control" id="dusun_edit" name="dusun">
                    @foreach($dusun as $ds)
                    <option value="{{ $ds->nama }}">{{ $ds->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="umur_edit" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur_edit" name="umur" required>
            </div>
            <div class="mb-3">
                <label for="pekerjaan_edit" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan" required>
            </div>
            <div class="mb-3">
                <label for="kawin_edit" class="form-label">Kawin</label>
                <select class="form-control" id="kawin_edit" name="kawin">
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                    <option value="KAWIN">KAWIN</option>
                    <option value="CERAI HIDUP">CERAI HIDUP</option>
                    <option value="CERAI MATI">CERAI MATI</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_perkawinan_edit">Tanggal Perkawinan</label>
                <input type="date" class="form-control" name="tanggal_perkawinan" id="tanggal_perkawinan_edit">
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
        const ubahForm = document.forms[1];
        const id = element.getAttribute('data-sensus-id');
        ubahForm.action = '/admin/penduduk/ubah?desa={{ $desa->id }}&sensus=' + id;

        const fields = element.getAttribute('data-fields').split('&');

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElement = document.getElementById(field[0] + '_edit');
            fieldElement.value = field[1];
        }
    }
</script>
@endsection
