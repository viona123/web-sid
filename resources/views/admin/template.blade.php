<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <title>Administrasi - @yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-dark position-sticky top-0" style="background-color: #339DFF">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="/images/logo.jpeg" width="30" height="24" class="d-inline-block">
          Siska
        </a>
        <div class="text-white">
          {{ $desa->nama }}
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 pt-4 ps-0 bg-dark" style="height: 100vh">
          <div class="list-group bg-dark">
            <h4 class="nav-header text-white ps-3">Menu Utama</h4>
            <hr class="bg-secondary">
            <a class="nav-link text-white" href="/admin?desa={{ $desa->id }}"><i class="fas fa-home me-1"></i> Home</a>
            <a class="nav-link text-white" href="/admin/identitas_desa?desa={{ $desa->id }}"><i class="fas fa-info me-1"></i> Info Desa</a>
            <div class="dropdown hihi">
              <button class="btn menu dropdown-toggle text-white" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> Kependudukan
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li class="hihi"><a class="dropdown-item" href="/admin/penduduk?desa={{ $desa->id }}"><i class="fas fa-user"></i> Penduduk</a></li>
                <li class="hihi"><a class="dropdown-item" href="/admin/keluarga?desa={{ $desa->id }}"><i class="fas fa-user-friends"></i> Keluarga</a></li>
                <li class="hihi"><a class="dropdown-item" href="/admin/rumah-tangga?desa={{ $desa->id }}"><i class="fas fa-venus-mars"></i> Rumah tangga</a></li>
                <li class="hihi"><a class="dropdown-item" href="/admin/kelompok?desa={{ $desa->id }}"><i class="fas fa-users"></i> Kelompok</a></li>
              </ul>
            </div>
            <a class="nav-link text-white" href="#"><i class="fas fa-book-reader me-1"></i> Layanan Surat</a>
            <div class="dropdown hihi">
              <button class="btn menu dropdown-toggle text-white" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-clipboard"></i> Buku Administrasi
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li class="hihi"><a class="dropdown-item" href="/admin/pengurus_desa?desa={{ $desa->id }}"><i class="fas fa-users"></i> Pengurus Desa</a></li>
              </ul>
            </div>
            <a class="nav-link text-white" href="/admin/program-bantuan?desa={{ $desa->id }}"><i class="fas fa-coins me-1"></i> Program Bantuan</a>
            <a class="nav-link text-white" href="#"><i class="fas fa-globe-asia me-1"></i> Pemetaaan</a>
            <a class="nav-link text-white" href="#"><i class="far fa-envelope me-1"></i> SMS</a>
            <a class="nav-link text-white" href="#"><i class="fas fa-cog me-1"></i> Pengaturan</a>
          </div>
        </div>
        <div class="col-md-10 pt-4" style="height: 100vh; overflow-y: scroll">
          @yield('content')

          <footer>
            Aplikasi SISKA 2022
          </footer>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });
    </script>
  </body>
</html>
