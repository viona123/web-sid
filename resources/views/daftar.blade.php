<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat akun Penduduk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: #0085FF; padding: 0 1rem 0 1rem;">
    <form method="post" class="ms-auto me-auto mt-5 mb-5 shadow p-4 bg-light" style="max-width: 30rem; border-radius: 1rem">
        <h1 class="text-center mb-5">Halaman Pendaftaran</h1>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="nomor induk kependudukan...">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="nama lengkap...">
        </div>
        <div class="mb-3">
            <label for="tempat-lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat-lahir" placeholder="tempat lahir...">
        </div>
        <div class="mb-3">
            <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
            <input type="datetime-local" class="form-control" id="tanggal-lahir">
        </div>
        <div class="mb-3">
            <label for="pin" class="form-label">Buat PIN</label>
            <input type="password" class="form-control" id="pin" placeholder="buat pin anda...">
        </div>
        <div class="mb-3">
            <label for="pin" class="form-label">Konfirmasi PIN</label>
            <input type="password" class="form-control" id="pin-confirm" placeholder="masukan ulang pin yang telah dibuat...">
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.forms[0].addEventListener('submit', function(event) {
            const pin = document.getElementById('pin');
            const pinConfirm = document.getElementById('pin-confirm');

            if (pin.value === pinConfirm.value) {
                return true;
            } else {
                alert("Konfirmasi PIN salah");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>