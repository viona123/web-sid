@extends('admin.template')

@section('title', 'Penduduk')

@section('content')

<h3>Data Penduduk</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Data Penduduk</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

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
                            <li><a onclick="edit(this, {{ $penduduk->id }})" class="dropdown-item" href="#ubah-data&status_dasar={{ $penduduk->status_dasar }}&nik={{ $penduduk->nik }}&no_kk={{ $penduduk->no_kk }}&no_kk_sebelumnya={{ $penduduk->no_kk_sebelumnya }}&nama_lengkap={{ $penduduk->nama }}&nik_ayah={{ $penduduk->nik_ayah }}&nik_ibu={{ $penduduk->nik_ibu }}&hubungan_keluarga={{ $penduduk->hubungan_keluarga }}&jenis_kelamin={{ $penduduk->jenis_kelamin }}&agama={{ $penduduk->agama }}&status_penduduk={{ $penduduk->status_penduduk }}&ttl={{ $penduduk->ttl }}&anak_ke={{ $penduduk->anak_ke }}&pendidikan_kk={{ $penduduk->pendidikan_kk }}&pendidikan_ditempuh={{ $penduduk->pendidikan_ditempuh }}&no_telp={{ $penduduk->no_telp }}&alamat_email={{ $penduduk->alamat_email }}&alamat={{ $penduduk->alamat }}&dusun={{ $penduduk->dusun }}&umur={{ $penduduk->umur }}&pekerjaan={{ $penduduk->pekerjaan }}&kawin={{ $penduduk->status_kawin }}&tanggal_perkawinan={{ $penduduk->tanggal_perkawinan }}" data-bs-toggle="modal" data-bs-target="#ubah-data"><i class="fas fa-edit d-inline-block me-2"></i> Ubah Biodata</a></li>
                            <li><a onclick="return confirm('Hapus data sensus ini?')" class="dropdown-item" href="/admin/{{ $desa->id }}/penduduk/hapus/{{ $penduduk->id }}"><i class="fas fa-trash d-inline-block me-2"></i> Hapus</a></li>
                        </ul>
                    </div>
                </td>
                <td>
                    <img src="/images/avatar-male.png" alt="info" style="width: 2rem">
                </td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->no_kk }}</td>
                <td>{{ $penduduk->nik_ayah }}</td>
                <td>{{ $penduduk->nik_ibu }}</td>
                <td>{{ $penduduk->alamat }}</td>
                <td>{{ $penduduk->dusun }}</td>
                <td>{{ $penduduk->pendidikan_kk }}</td>
                <td>{{ $penduduk->umur }}</td>
                <td>{{ $penduduk->pekerjaan }}</td>
                <td>{{ $penduduk->status_kawin}}</td>
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
                <input type="number" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="no_kk" name="no_kk">
            </div>
            <div class="mb-3">
                <label for="no_kk_sebelumnya" class="form-label">Nomor Kartu Keluarga Sebelumnya</label>
                <input type="number" class="form-control" id="no_kk_sebelumnya" name="no_kk_sebelumnya">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
            </div>
            <div class="mb-3">
                <label for="nik_ayah" class="form-label">NIK Ayah</label>
                <input type="number" class="form-control" id="nik_ayah" name="nik_ayah">
            </div>
            <div class="mb-3">
                <label for="nik_ibu" class="form-label">NIK Ibu</label>
                <input type="number" class="form-control" id="nik_ibu" name="nik_ibu">
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga" class="form-label">Hubungan Dalam Keluarga</label>
                <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <input type="radio" value="L" name="jenis_kelamin" id="laki_laki"> <label for="laki_laki">Laki-laki</label>
                <input type="radio" value="P" name="jenis_kelamin" id="perempuan"> <label for="perempuan">Perempuan</label>
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
                <input type="text" class="form-control" name="ttl" id="ttl">
            </div>
            <div class="mb-3">
                <label class="form-label" for="anak_ke">Kelahiran Anak Ke</label>
                <input type="number" class="form-control" name="anak_ke" id="anak_ke">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_kk">Pendidikan Dalam KK</label>
                <input type="text" class="form-control" name="pendidikan_kk" id="pendidikan_kk">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_ditempuh">Pendidikan yang sedang ditempuh</label>
                <input type="text" class="form-control" name="pendidikan_ditempuh" id="pendidikan_ditempuh">
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_telp">Nomor Telepon</label>
                <input type="tel" class="form-control" name="no_telp" id="no_telp">
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_email">Alamat Email</label>
                <input type="email" class="form-control" name="alamat_email" id="alamat_email">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label">Dusun</label>
                <input type="text" class="form-control" id="dusun" name="dusun">
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur">
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
            </div>
            <div class="mb-3">
                <label for="kawin" class="form-label">Kawin</label>
                <input type="text" class="form-control" id="kawin" name="kawin">
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
                <input type="number" class="form-control" id="nik_edit" name="nik">
            </div>
            <div class="mb-3">
                <label for="no_kk_edit" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="no_kk_edit" name="no_kk">
            </div>
            <div class="mb-3">
                <label for="no_kk_sebelumnya_edit" class="form-label">Nomor Kartu Keluarga Sebelumnya</label>
                <input type="number" class="form-control" id="no_kk_sebelumnya_edit" name="no_kk_sebelumnya">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap_edit" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap_edit" name="nama_lengkap">
            </div>
            <div class="mb-3">
                <label for="nik_ayah_edit" class="form-label">NIK Ayah</label>
                <input type="number" class="form-control" id="nik_ayah_edit" name="nik_ayah">
            </div>
            <div class="mb-3">
                <label for="nik_ibu_edit" class="form-label">NIK Ibu</label>
                <input type="number" class="form-control" id="nik_ibu_edit" name="nik_ibu">
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga_edit" class="form-label">Hubungan Dalam Keluarga</label>
                <input type="text" class="form-control" id="hubungan_keluarga_edit" name="hubungan_keluarga">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <input type="radio" value="L" name="jenis_kelamin" id="laki_laki_edit"> <label for="laki_laki">Laki-laki</label>
                <input type="radio" value="P" name="jenis_kelamin" id="perempuan_edit"> <label for="perempuan">Perempuan</label>
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
                <input type="text" class="form-control" name="ttl" id="ttl_edit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="anak_ke_edit">Kelahiran Anak Ke</label>
                <input type="number" class="form-control" name="anak_ke" id="anak_ke_edit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_kk_edit">Pendidikan Dalam KK</label>
                <input type="text" class="form-control" name="pendidikan_kk" id="pendidikan_kk_edit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pendidikan_ditempuh_edit">Pendidikan yang sedang ditempuh</label>
                <input type="text" class="form-control" name="pendidikan_ditempuh" id="pendidikan_ditempuh_edit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_telp_edit">Nomor Telepon</label>
                <input type="tel" class="form-control" name="no_telp" id="no_telp_edit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_email_edit">Alamat Email</label>
                <input type="email" class="form-control" name="alamat_email" id="alamat_email_edit">
            </div>
            <div class="mb-3">
                <label for="alamat_edit" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_edit" name="alamat">
            </div>
            <div class="mb-3">
                <label for="dusun_edit" class="form-label">Dusun</label>
                <input type="text" class="form-control" id="dusun_edit" name="dusun">
            </div>
            <div class="mb-3">
                <label for="umur_edit" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur_edit" name="umur">
            </div>
            <div class="mb-3">
                <label for="pekerjaan_edit" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan">
            </div>
            <div class="mb-3">
                <label for="kawin_edit" class="form-label">Kawin</label>
                <input type="text" class="form-control" id="kawin_edit" name="kawin">
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
    function edit(anchor, id) {
        const ubahForm = document.forms[1];
        ubahForm.action = '/admin/penduduk/ubah?desa={{ $desa->id }}&sensus=' + id;

        const url = anchor.href;
        const urlFragment = url.substring(url.indexOf('#') + 1);
        const data = urlFragment.split('&');

        for (let i = 1; i < data.length; i++) {
            const field = data[i].split('=');
            if (field[0] !== 'jenis_kelamin') {
                const fieldElement = document.getElementById(field[0] + '_edit');
                fieldElement.value = field[1];
            } else {
                const kelamin = (field[1] == 'L') ? 'laki_laki' : 'perempuan';
                const fieldKelamin = document.getElementById(kelamin + '_edit');
                fieldKelamin.checked = true;
            }
        }

        console.log(data);
    }
</script>
@endsection
