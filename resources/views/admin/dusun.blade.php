@extends('admin.template')

@section('title', 'Wilayah Dusun')

@section('content')

<h3>Wilayah Administrasi Dusun</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Dusun</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="overflow-x: auto;">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed;">
        <colgroup>
            <col span="1" style="min-width: 2rem">
            <col span="1" style="width: 14rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 10rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nama Dusun</th>
	            <th>Kepala Dusun</th>
	            <th>RW</th>
	            <th>RT</th>
	            <th>KK</th>
	            <th>L+P</th>
	            <th>L</th>
	            <th>P</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($semua_dusun as $dusun)
	        <tr>
	            <td>{{ $dusun->id }}</td>
	            <td>
	                <button onclick="edit(this, )" data-fields="nama={{ $dusun->nama }}&kdusun={{ $dusun->kepala_dusun }}&rw={{ $dusun->jumlah_rw }}&rt={{ $dusun->jumlah_rt }}&kk={{ $dusun->jumlah_kk }}&lp={{ $dusun->jumlah_lp }}&l={{ $dusun->jumlah_l }}&p={{ $dusun->jumlah_p }}" data-dusun-id="{{ $dusun->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                    <a onclick="return confirm('Hapus data dusun {{ $dusun->nama }}?')" class="btn btn-danger btn-aksi" href="/admin/wilayah_desa/hapus?desa={{ $desa->id }}&dusun={{ $dusun->id }}"><i class="fas fa-trash-alt"></i></a>
	                <div class="dropdown d-inline-block">
	                    <button class="btn btn-primary dropdown-toggle btn-aksi" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-arrow-circle-down d-inline-block me-2"></i> Peta</button>
	                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <li><a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt d-inline-block me-2"></i> Lokasi Kantor</a></li>
	                        <li><a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt d-inline-block me-2"></i> Peta Wilayah</a></li>
	                    </ul>
	                </div>
	            </td>
	            <td>{{ $dusun->nama }}</td>
	            <td>{{ $dusun->kepala_dusun }}</td>
	            <td>{{ $dusun->jumlah_rw }}</td>
	            <td>{{ $dusun->jumlah_rt }}</td>
	            <td>{{ $dusun->jumlah_kk }}</td>
	            <td>{{ $dusun->jumlah_lp }}</td>
	            <td>{{ $dusun->jumlah_l }}</td>
	            <td>{{ $dusun->jumlah_p }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Dusun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/wilayah_desa/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama-dusun" class="form-label">Nama Dusun</label>
                <input type="text" class="form-control" id="nama-dusun" name="nama-dusun">
            </div>
            <div class="mb-3">
                <label for="kepala-dusun" class="form-label">Kepala Dusun</label>
                <input type="text" class="form-control" id="kepala-dusun" name="kepala-dusun">
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
      <form action="/admin/wilayah_desa/ubah?desa={{ $desa->id }}" method="post">
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
    function edit(element) {
        const formUbah = document.forms[1];
        const id = element.getAttribute('data-dusun-id');
        formUbah.action = "/admin/wilayah_desa/ubah?desa={{ $desa->id }}&dusun=" + id;

        const fields = element.getAttribute('data-fields');
        const data = fields.split('&');
        
        const 
            nama = document.getElementById('nama-dusun-edit'),
            kdusun = document.getElementById('kepala-dusun-edit'),
            rw = document.getElementById('jumlah-rw'),
            rt = document.getElementById('jumlah-rt'),
            kk = document.getElementById('jumlah-kk'),
            lp = document.getElementById('jumlah-lp'),
            l = document.getElementById('jumlah-l'),
            p = document.getElementById('jumlah-p');

        nama.value = data[0].substring(data[0].indexOf('=') + 1);
        kdusun.value = data[1].substring(data[1].indexOf('=') + 1);
        rw.value = data[2].substring(data[2].indexOf('=') + 1);
        rt.value = data[3].substring(data[3].indexOf('=') + 1);
        kk.value = data[4].substring(data[4].indexOf('=') + 1);
        lp.value = data[5].substring(data[5].indexOf('=') + 1);
        l.value = data[6].substring(data[6].indexOf('=') + 1);
        p.value = data[7].substring(data[7].indexOf('=') + 1);
    }
</script>

@endsection
