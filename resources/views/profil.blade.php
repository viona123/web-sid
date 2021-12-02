<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <title>Profil | {{ $penduduk->nama }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-primary ms-2 me-2">
<img src="/images/background-portrait.png" alt="background" class="position-fixed top-0 start-0" style="width: 100%; height: 100%; z-index: -1">
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto shadow mt-4 bg-white" style="max-width: 30rem; border-radius: 1rem">
                <div class="mb-5 mt-4">
                    @if ($status == "daftar-berhasil")
                        <div class="alert alert-success">
                            Pendaftaran <strong>Berhasil!</strong>
                        </div>
                    @endif
                    @if ($penduduk->jenis_kelamin == "L")
                        <img src="/images/avatar-male.png" alt="ikon" class="m-auto d-block mb-4" style="width: 7rem">
                    @elseif ($penduduk->jenis_kelamin == "P")
                        <img src="/images/avatar-female.png" alt="ikon" class="m-auto d-block mb-4" style="width: 7rem">
                    @endif
                    <h1 class="text-center">{{ $penduduk->nama }}</h1>
                </div>
                <hr>
                <div class="mt-4 mb-4">
                    <div class="mb-3">
                        <label class="form-label">Nomor Kartu Keluarga</label>
                        <input type="number" class="form-control" value="{{ $penduduk->no_kk }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Kependudukan</label>
                        <input type="number" class="form-control" value="{{ $penduduk->nik }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Tinggal</label>
                        <input type="text" class="form-control" value="{{ $penduduk->tempat_tinggal }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
