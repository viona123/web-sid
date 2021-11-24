<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="ms-2 me-2">
        <img src="/images/bg.jpg" alt="background" id="background">
        <div id="card" style="max-width: 25rem; width: auto">
            <div id="card-content">
            <img src="/images/logo-provinsi-jawa-tengah.jpg" id="logo-desa"/>
            <div id="card-title">
                <h2>SISKA ADMIN</h2>
            </div>
        </div>
        @if ($status == "gagal")
            <div class="alert alert-danger">
                Login <strong>Gagal!</strong>
            </div>
        @endif
        <form method="post" class="form">
            @csrf
            <label for="nama-pengguna" style="padding-top:13px">&nbsp;Nama pengguna</label>
            <input
            id="nama-pengguna"
            class="form-content"
            type="pengguna"
            name="pengguna"
            autocomplete="on"
            required />
            <div class="form-border"></div>
            <label for="user-password" style="padding-top:22px">&nbsp;Kata Sandi</label>
            <input
            id="user-password"
            class="form-content"
            type="password"
            name="password"
            required />
            <div class="form-border"></div>
            <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        </form>
    </body>
</html>
