@extends('admin.template')

@section('title', 'Keluarga')

@section('content')
<h3>Data Keluarga</h3><hr class="bg-primary">
<button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Keluarga</button>
<button class="btn btn-primary m-2"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
<button class="btn btn-secondary m-2"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
<button onclick="location.reload();" class="btn btn-primary m-2"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 3rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 15rem">
            <col span="1" style="width: 12rem">
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Aksi</th>
	            <th>Nomor_KK</th>
	            <th>kepala keluarga</th>
	            <th>NIK</th>
	            <th>Jumlah Anggota Keluarga</th>
	            <th>Alamat</th>
	            <th>Dusun</th>
	            <th>RW</th>
	            <th>RT</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($keluarga as $keluarga)
	        <tr>
	            <td>{{ $keluarga->id }}</td>
	            <td>
                <a class="btn btn-primary btn-aksi" href="/admin/keluarga/detail?desa={{ $desa->id }}&keluarga={{ $keluarga->id }}"><i class="fas fa-list"></i></a> 
                <button onclick="edit(this)" data-fields="nomor-kk={{ $keluarga->Nomor_KK }}&kepala-keluarga={{ $keluarga->kepala->nama }} - {{ $keluarga->kepala->nik }}&alamat={{ $keluarga->Alamat }}&dusun={{ $keluarga->Dusun }}&rw={{ $keluarga->RW }}&rt={{ $keluarga->RT }}" data-keluarga-id="{{ $keluarga->id }}" data-bs-toggle="modal" data-bs-target="#ubah-data" class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
	                <a onclick="return confirm('Hapus data keluarga {{ $keluarga->kepala->nama }}?')" class="btn btn-danger btn-aksi" href="/admin/keluarga/hapus?desa={{ $desa->id }}&keluarga={{ $keluarga->id }}"><i class="fas fa-trash-alt"></i></a>
	            </td>
	            <td>{{ $keluarga->Nomor_KK }}</td>
	            <td>{{ $keluarga->kepala->nama }}</td>
	            <td>{{ $keluarga->NIK }}</td>
	            <td>{{ $keluarga->anggota->count() }}</td>
	            <td>{{ $keluarga->Alamat}}</td>
	            <td>{{ $keluarga->Dusun }}</td>
	            <td>{{ $keluarga->RW }}</td>
	            <td>{{ $keluarga->RT }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</div>

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keluarga/tambah?desa={{ $desa->id }}" method="post">
      @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nomor-kk" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="nomor-kk" name="nomor_kk" required>
            </div>
            <div class="mb-3">
                <label for="kepala-keluarga" class="form-label">Kepala Keluarga</label>
                <div class="suggested-input">
                    <input type="text" class="form-control" id="kepala-keluarga" onkeyup="filter(this)" onfocus="this.value=''" data-sug-id="suggestion" name="kepala_keluarga" autocomplete="off" required>
                    <ul class="suggestion" id="suggestion">
                        @foreach ($sensus as $penduduk)
                        <li>{{ $penduduk->nama }} - {{ $penduduk->nik }}</li>
                        @endforeach
                    </ul>
                </div>
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
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt" name="rt" required>
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw" name="rw" required>
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
        <h5 class="modal-title" id="ubah-data-label">Ubah Data Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/keluarga/ubah" method="post">
      @csrf
        <div class="modal-body">
        <div class="mb-3">
                <label for="nomor-kk" class="form-label">Nomor Kartu Keluarga</label>
                <input type="number" class="form-control" id="nomor-kk-edit" name="nomor_kk" required>
            </div>
            <div class="mb-3">
                <label for="kepala-keluarga" class="form-label">Kepala Keluarga</label>
                <div class="suggested-input">
                    <input type="text" class="form-control" id="kepala-keluarga-edit" onkeyup="filter(this)" onfocus="this.value=''" data-sug-id="suggestion-edit" name="kepala_keluarga" autocomplete="off" required>
                    <ul class="suggestion" id="suggestion-edit">
                        @foreach ($sensus as $penduduk)
                        <li>{{ $penduduk->nama }} - {{ $penduduk->nik }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat-edit" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="dusun" class="form-label">Dusun</label>
                <select class="form-control" id="dusun-edit" name="dusun">
                    @foreach($dusun as $ds)
                    <option value="{{ $ds->nama }}">{{ $ds->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt-edit" name="rt" required>
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw-edit" name="rw" required>
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
        const id = element.getAttribute('data-keluarga-id');
        formUbah.action = "/admin/keluarga/ubah?desa={{ $desa->id }}&keluarga=" + id;

        const fields = element.getAttribute('data-fields').split('&');
        
        for (let i = 0; i < fields.length; i++) {
            const field = fields[i].split('=');
            const fieldElement = document.getElementById(field[0] + '-edit');

            fieldElement.value = field[1];
        }
    }

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
