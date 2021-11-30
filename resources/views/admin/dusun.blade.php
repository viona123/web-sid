@extends('admin.template')

@section('content')
<div class="container">
    <div class="col-md-8 position-fixed main">
        <h3>Wilayah Administrasi Dusun</h3><hr class="bg-primary">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-data"><i class="fas fa-plus d-inline-block me-2"></i> Tambah Dusun</button>
        <button class="btn btn-primary"><i class="fas fa-print d-inline-block me-2"></i> Cetak</button>
        <button class="btn btn-secondary"><i class="fas fa-download d-inline-block me-2"></i> Unduh</button>
        <button class="btn btn-primary"><i class="fas fa-sync d-inline-block me-2"></i> Bersihkan</button>

        <table class="table table-secondary table-stripped mt-5">
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
                <tr>
                    <td>1</td>
                    <td>
                        <button class="btn btn-success btn-aksi"><i class="fas fa-arrow-up"></i></button>
                        <button class="btn btn-success btn-aksi"><i class="fas fa-arrow-down"></i></button>
                        <button class="btn btn-warning btn-aksi"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-primary btn-aksi"><i class="fas fa-th-list"></i></button>
                        <button class="btn btn-danger btn-aksi"><i class="fas fa-trash-alt"></i></button>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-primary dropdown-toggle btn-aksi" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-arrow-circle-down d-inline-block me-2"></i> Peta</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt d-inline-block me-2"></i> Lokasi Kantor</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt d-inline-block me-2"></i> Peta Wilayah</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>SSSSSS</td>
                    <td>Unknown</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-data-label">Tambah Data Dusun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
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