<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <title>Administrasi</title>
  </head>
  <body>
    <!--navbar menu-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #339DFF">
  <div class="container-fluid">
  <a class="navbar-brand" href="/">
      <img src="/images/logo.jpeg" alt="Siska" style="width: 2rem">
      Siska
  </a>
   <!--tooltip-->
   <div class="icon mx-auto">
      <h5>
          <i class="fas fa-print me-4"data-bs-toggle="tooltip" data-bs-html="true" title="cetak"></i>
          <i class="far fa-comment-dots me-4 "data-bs-toggle="tooltip" data-bs-html="true" title="komentar"></i>
          <i class="fas fa-envelope me-4"data-bs-toggle="tooltip" data-bs-html="true" title="pesan"></i>
          <i class="fas fa-users"> <em>team </em></i>
      </h5> 
    </div>
    </div>
  </div>
  </nav>
    <!--list item-->
    <div class="row no-gutters">
    <div class="col-md-2 mt-5 bg-dark mt-2 pe-3 pt-4 position-fixed top-0 start-0 menu" style="height: 100%;">
    <ul class="nav flex-column ml-2 mb-2">
      <li class="nav-header ps-3">Menu Utama</li><hr class="bg-secondary">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home me-1"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-tachometer me-1"></i> Info Perumahan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user-plus me-1"></i> Kependudukan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="far fa-chart-bar me-1"></i> Statistik</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book-reader me-1"></i> Layanan Surat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-tty me-1"></i> Sekretariat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-balance-scale me-1"></i> Keuangan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="far fa-clipboard me-1"></i> Buku Administrasi Desa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="far fa-address-card me-1"></i> Master Analisis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-tint me-1"></i> Program Bantuan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-university me-1"></i> Pembangunan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-globe-asia me-1"></i> Pemetaaan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="far fa-envelope me-1"></i> SMS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> Pengaturan</a>
      </li>
    </ul>
   </div>
    <div class="col-md-8 position-fixed main">
      <h3>SISKA</h3><hr class="bg-primary"> 
      <div class="row text-white ms-2">
        <div class="card bg-primary m-2" style="width: 15rem;">
         <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="display-4">18</div>
           <h5 class="card-title">Wilayah Dusun</h5>
          <a href="/admin/wilayah_desa"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
       <div class="card bg-info m-2" style="width: 15rem;">
         <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-user"></i>
          </div>
          <div class="display-4">10338</div>
           <h5 class="card-title">Penduduk</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
       <div class="card bg-success m-2" style="width: 15rem;">
         <div class="card-body">
          <div class="card-body-icon">
           <i class="fas fa-users"></i>
          </div>
          <div class="display-4">5338</div>
           <h5 class="card-title">Keluarga</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
       <div class="card bg-danger m-2" style="width: 15rem;">
         <div class="card-body">
          <div class="card-body-icon">
              <i class="fas fa-book"></i>
          </div>
          <div class="display-4">5338</div>
           <h5 class="card-title">Surat Tercetak</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
        <div class="card bg-primary m-2" style="width: 10em">
         <div class="card-body">
          <div class="card-body-icon">
              <i class="fas fa-user-friends"></i>
          </div>
          <div class="display-4">0</div>
           <h5 class="card-title">Kelompok</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
      <div class="card bg-secondary m-2" style="width: 10em;">
         <div class="card-body">
          <div class="card-body-icon">
              <i class="fas fa-home"></i>
          </div>
          <div class="display-4">1</div>
           <h5 class="card-title">Rumah Tangga</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
      <div class="card bg-warning m-2" style="width: 10em;">
         <div class="card-body">
          <div class="card-body-icon">
              <i class="fas fa-project-diagram"></i>
          </div>
          <div class="display-4">6</div>
           <h5 class="card-title">BPNT</h5>
          <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right"></i></p></a>
         </div>
      </div>
     </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
}):
</script>
  </body>
</html>