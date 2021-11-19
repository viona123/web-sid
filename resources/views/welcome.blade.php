<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>SISKA | Sistem Informasi Desa dan Kawasan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Siska</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Kontak</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="position-relative">
        <img src="/images/bg.jpg" alt="desa" style="width: 100%">
        <div class="position-absolute text-white text-center" style="width: 60%; top: 7rem; left: 20%">
            <h1 style="font-size: 7rem;">SISKA</h1>
            <p style="font-size: 2rem;">Sistem Informasi Desa dan Kawasan</p>
            <div class="d-flex justify-content-center">
                <div class="dropdown me-4">
                    <button class="btn btn-primary dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Masuk
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/login/admin">Admin</a></li>
                        <li><a class="dropdown-item" href="/login/penduduk">Penduduk</a></li>
                    </ul>
                </div>

                <button class="btn btn-success rounded-pill">Download</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>