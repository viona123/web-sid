<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head>
    <body>
        <img src="/images/bg.jpeg" alt="background" id="background">
        <div id="card">
            <div id="card-content">
            <img src="/images/logo-provinsi-jawa-tengah.jpg" id="logo-desa"/>
            <div id="card-title">
                <h2>PERUMAHAN TEST</h2>
            </div>
        </div>
        <form method="post" class="form">
            @csrf
            <label for="nik" style="padding-top:13px">&nbsp;NIK</label>
            <input
            id="nik"
            class="form-content"
            type="text"
            name="nik"
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
            <a href="#"><legend id="forgot-pass">Lupa Password?</legend></a>
            <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        </form>
    </body>
</html>
