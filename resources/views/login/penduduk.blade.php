<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <img src="/images/background-biru.png" alt="background" id="background">
        <div id="card" style="max-width: 25rem; width: auto">
            <div id="card-content">
            <img src="/images/logo-provinsi-jawa-tengah.jpg" id="logo-desa"/>
            <div id="card-title">
                <h2>PERUMAHAN TEST</h2>
            </div>
        </div>
        @if ($status == "gagal")
            <div class="alert alert-danger">
                Login <strong>Gagal!</strong>
            </div>
        @endif
        <form method="post" class="form">
            @csrf
            <label for="nama_lengkap" style="padding-top:13px">&nbsp;Nama Lengkap</label>
            <input
            id="nama_lengkap"
            class="form-content"
            type="text"
            name="nama_lengkap"
            autocomplete="on"
            required />
            <div class="form-border"></div>
            <label for="user-pin" style="padding-top:22px">&nbsp;PIN</label>
            <input
            id="user-pin"
            class="form-content"
            type="pin"
            name="pin"
            required />
            <div class="form-border"></div>
            <legend id="forgot-pass">Belum memiliki akun? <a href="/daftar">Daftar!</a></legend>
            <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        </form>
    </body>
</html>
