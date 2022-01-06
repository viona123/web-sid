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
        <img src="/images/background.png" alt="background" id="background">
        <div id="card" style="max-width: 25rem; width: auto">
            <div id="card-content">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="logo-desa">
                <circle cx="12" cy="8" fill="#464646" r="4"/>
                <path d="M20,19v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V19a6,6,0,0,1,6-6h4A6,6,0,0,1,20,19Z" fill="#464646"/>
            </svg>
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
            <input
            id="nama-pengguna"
            class="form-content"
            type="pengguna"
            name="pengguna"
            placeholder="Nama pengguna"
            autocomplete="off"
            required />
            <input
            id="user-password"
            class="form-content"
            type="password"
            name="password"
            placeholder="Password"
            required />
            <select name="desa" id="desa" class="form-content">
                <option selected>---PILIH DESA---</option>
                @foreach($list_desa as $desa)
                <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                @endforeach
            </select>
           <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        </form>
    </body>
</html>
