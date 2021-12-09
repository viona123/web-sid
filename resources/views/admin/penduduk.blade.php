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
                            <li><a class="dropdown-item" href="#"><i class="fas fa-th-list d-inline-block me-2"></i> Lihat detail Biodata Penduduk</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit d-inline-block me-2"></i> Ubah Biodata</a></li>
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
      <form action="/admin/{{ $desa->id }}/penduduk/tambah" method="post">
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

<div class="modal fade" id="ubah-data" tabindex="-1" aria-labelledby="ubah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubah-data-label">Ubah Data Dusun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/wilayah_desa/ubah" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama-dusun-edit" class="form-label">Nama Dusun</label>
                <input type="text" class="form-control" id="nama-dusun-edit" name="nama-dusun">
            </div>
            <div class="mb-3">
                <label for="kepala-dusun-edit" class="form-label">Kepala Dusun</label>
                <input type="text" class="form-control" id="kepala-dusun-edit" name="kepala-dusun">
            </div>
            <div class="mb-3">
                <label for="jumlah-rw" class="form-label">Jumlah RW</label>
                <input type="number" class="form-control" id="jumlah-rw" name="jumlah-rw">
            </div>
            <div class="mb-3">
                <label for="jumlah-rt" class="form-label">Jumlah RT</label>
                <input type="number" class="form-control" id="jumlah-rt" name="jumlah-rt">
            </div>
            <div class="mb-3">
                <label for="jumlah-kk" class="form-label">Jumlah KK</label>
                <input type="number" class="form-control" id="jumlah-kk" name="jumlah-kk">
            </div>
            <div class="mb-3">
                <label for="jumlah-lp" class="form-label">Jumlah LP</label>
                <input type="number" class="form-control" id="jumlah-lp" name="jumlah-lp">
            </div>
            <div class="mb-3">
                <label for="jumlah-l" class="form-label">Jumlah L</label>
                <input type="number" class="form-control" id="jumlah-l" name="jumlah-l">
            </div>
            <div class="mb-3">
                <label for="jumlah-p" class="form-label">Jumlah P</label>
                <input type="number" class="form-control" id="jumlah-p" name="jumlah-p">
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
    function edit(anchor, id) {
        const formUbah = document.forms[1];
        formUbah.action = "/admin/wilayah_desa/ubah/" + id;

        const url = anchor.href;
        const urlFragment = url.substring(url.indexOf('#') + 1);
        const data = urlFragment.split('&');
        
        const 
            nama = document.getElementById('nama-dusun-edit'),
            kdusun = document.getElementById('kepala-dusun-edit'),
            rw = document.getElementById('jumlah-rw'),
            rt = document.getElementById('jumlah-rt'),
            kk = document.getElementById('jumlah-kk'),
            lp = document.getElementById('jumlah-lp'),
            l = document.getElementById('jumlah-l'),
            p = document.getElementById('jumlah-p');

        nama.value = data[1].substring(data[1].indexOf('=') + 1);
        kdusun.value = data[2].substring(data[2].indexOf('=') + 1);
        rw.value = data[3].substring(data[3].indexOf('=') + 1);
        rt.value = data[4].substring(data[4].indexOf('=') + 1);
        kk.value = data[5].substring(data[5].indexOf('=') + 1);
        lp.value = data[6].substring(data[6].indexOf('=') + 1);
        l.value = data[7].substring(data[7].indexOf('=') + 1);
        p.value = data[8].substring(data[8].indexOf('=') + 1);
    }
</script>
@endsection
