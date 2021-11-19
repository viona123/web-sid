<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head>
    <body>
        <img src="/images/bg.jpg" alt="background" id="background">
        <div id="card">
            <div id="card-content">
            <img src="/images/logo-provinsi-jawa-tengah.jpg" id="logo-desa"/>
            <div id="card-title">
                <h2>SISKA ADMIN</h2>
            </div>
        </div>
        <form method="post" class="form">
            @csrf
            <label for="Nama pengguna" style="padding-top:13px">&nbsp;Nama pengguna</label>
            <input
            id="nama pengguna"
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
