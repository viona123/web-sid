<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SISKA | @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #339DFF">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logo-transparent.png" alt="siska" style="width: 2rem">
                SISKA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="/tentang">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container-fluid bg-primary">
        <div class="row justify-content-evenly">
            <div class="col-md-5 d-flex justify-content-center">
                <div class="m-4 text-center">
                    <h2 class="mb-3 text-white">Social Media</h2>
                    <a href="javascript:void(0)">
                        <img style="width: 3em; margin: 1rem" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48Zz48cGF0aCBkPSJNMjU4LjgsNTA3LjJDMTIwLjQsNTA3LjgsNi42LDM5Mi42LDkuOSwyNTEuOUMxMywxMTcuOSwxMjQsNy4yLDI2Miw4LjdDMzk4LjcsMTAuMiw1MTEuOCwxMjQsNTA4LjEsMjY0LjkgICBDNTA0LjYsMzk4LjMsMzk0LjUsNTA3LjksMjU4LjgsNTA3LjJ6IE00MC4yLDI1OC4zQzQxLjMsMzgzLjYsMTQyLjksNDgwLjEsMjYyLjksNDc4YzExNi4yLTIuMSwyMTQuNy05Ni44LDIxNC43LTIyMCAgIGMwLTEyNS4zLTEwMi40LTIyMi4yLTIyMi44LTIxOS45QzEzOC42LDQwLjIsNDEsMTM1LjIsNDAuMiwyNTguM3oiLz48cGF0aCBkPSJNMjA2LjgsNDMzLjRjMC01OC45LDAtMTE3LjMsMC0xNzYuM2MtMTMsMC0yNS42LDAtMzguNSwwYzAtMjAsMC0zOS40LDAtNTkuNGMxLjctMC4xLDMuNC0wLjMsNS4yLTAuMyAgIGM5LjMsMCwxOC43LTAuMiwyOCwwLjFjNC4xLDAuMSw1LjUtMSw1LjQtNS4yYy0wLjItMTUuMi0wLjItMzAuMy0wLjEtNDUuNWMwLjEtMTcuMSw0LjktMzIuNiwxNy4xLTQ1YzExLjgtMTIsMjYuOS0xOC41LDQzLjMtMTkuNSAgIGMyNi40LTEuNSw1Mi45LTEuMyw3OS40LTEuOGMwLjMsMCwwLjYsMC4zLDEuMiwwLjZjMCwyMC4xLDAsNDAuMywwLDYxYy0xLjksMC4xLTMuNywwLjItNS40LDAuMmMtMTIsMC0yNCwwLTM2LDAgICBjLTEyLjEsMC4xLTE5LjIsNy4zLTE5LjIsMTkuMmMwLDExLjMsMCwyMi43LDAuMSwzNGMwLDAuMywwLjIsMC42LDAuNSwxLjdjMTkuOCwwLDM5LjgsMCw2MC44LDBjLTIuNiwyMC4zLTUsMzkuNy03LjYsNTkuOCAgIGMtMTguMSwwLTM1LjgsMC01NCwwYzAsNTkuMiwwLDExNy44LDAsMTc2LjZDMjYwLjEsNDMzLjQsMjMzLjksNDMzLjQsMjA2LjgsNDMzLjR6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img style="width: 3em; margin: 1rem" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48Zz48cGF0aCBkPSJNMjU4LjgsNTA3LjJDMTIwLjQsNTA3LjgsNi42LDM5Mi42LDkuOSwyNTEuOUMxMywxMTgsMTI0LDcuMiwyNjIsOC43QzM5OC43LDEwLjIsNTExLjgsMTI0LDUwOC4xLDI2NC45ICAgQzUwNC42LDM5OC4zLDM5NC42LDUwNy45LDI1OC44LDUwNy4yeiBNNDc3LjgsMjU3LjljLTEtMTI1LjMtMTAyLjQtMjIxLjctMjIyLTIxOS45QzEzOS4zLDM5LjcsNDAuMiwxMzQuNyw0MC40LDI1OC4zICAgYzAuMiwxMjUuMywxMDIuNCwyMjEuNiwyMjIsMjE5LjdDMzc4LjgsNDc2LjIsNDc2LjksMzgxLjQsNDc3LjgsMjU3Ljl6Ii8+PHBhdGggZD0iTTExMC41LDQwMy4zYzMuNS0xMC42LDYuOC0yMC40LDEwLTMwLjFjNC41LTEzLjQsOC45LTI2LjgsMTMuNi00MC4yYzEuMi0zLjQsMS4xLTYuMS0wLjctOS4zICAgYy00Ni04Mi42LDEuMS0xODYuNSw5My40LTIwNi40Yzc3LjUtMTYuNywxNTMuOSwzNC40LDE2OC4yLDExMi41YzEzLjUsNzQuMi0zMy42LDE0Ni0xMDcuMSwxNjIuOGMtMzIuNCw3LjQtNjMuOSwzLjctOTMuOC0xMS4yICAgYy00LTItNy4zLTIuNS0xMS43LTFjLTIyLjksNy42LTQ1LjksMTQuOC02OC45LDIyLjFDMTEyLjgsNDAyLjcsMTEyLjIsNDAyLjgsMTEwLjUsNDAzLjN6IE0xNDYuOSwzNjcuNSAgIGMxNC4zLTQuNiwyNy40LTguNyw0MC41LTEzLjFjMy0xLDUuNC0wLjgsOC4zLDAuOWMyOC40LDE3LjEsNTguOSwyMS40LDkwLjgsMTMuMmM1OS4xLTE1LjMsOTYuMi03NC41LDg1LjMtMTM0LjcgICBjLTExLTYwLjgtNjguNy0xMDIuOC0xMzAuMy05NC45Yy04NS43LDExLTEzMC41LDEwOC4xLTgzLjEsMTgwLjNjMi40LDMuNywyLjYsNi42LDEuMiwxMC41QzE1NS4zLDM0MS45LDE1MS4zLDM1NC4yLDE0Ni45LDM2Ny41eiIvPjxwYXRoIGQ9Ik0xODYsMjIyLjJjMC4yLTEzLjgsNS4xLTI0LjEsMTQuNC0zMi40YzQuMy0zLjgsMTUtNS4yLDE5LjgtMi4zYzEuNywxLDMsMy4yLDMuNyw1LjFjMy42LDkuMyw3LjIsMTguNiwxMC4zLDI4LjEgICBjMC43LDIuMywwLjEsNS43LTEuMSw3LjhjLTIuMywzLjgtNS41LDcuMS04LjYsMTAuM2MtMi4zLDIuNC0yLjgsNC42LTEuMiw3LjZjMTAuOSwyMC4yLDI2LjcsMzUsNDcuNyw0NC40YzMuMSwxLjQsNS43LDAuOCw4LTEuOSAgIGMzLjUtNC4yLDcuMy04LjIsMTAuOC0xMi41YzIuMi0yLjgsNC44LTMuNiw3LjktMmM5LjcsNSwxOS42LDkuOSwyOSwxNS41YzEuNywxLDIuOCw0LjgsMi42LDcuMmMtMS4zLDE3LjItMTMsMjQuNS0yNy45LDI3LjkgICBjLTYuOSwxLjYtMTMuNCwwLjItMjAuMS0xLjhjLTQxLjUtMTEuOS02OC45LTQwLTg4LjYtNzYuOUMxODguNSwyMzguNCwxODYuMSwyMzAsMTg2LDIyMi4yeiIvPjwvZz48L3N2Zz4=" alt="">
                    </a>
                    <a href="https://instagram.com/siska.contact">
                        <img style="width: 3em; margin: 1rem" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48Zz48cGF0aCBkPSJNMjU4LjksNTA3LjJDMTIwLjQsNTA3LjksNi42LDM5Mi42LDkuOSwyNTJDMTIuOSwxMTgsMTI0LDcsMjYyLjMsOC43YzEzNi42LDEuNywyNDkuNCwxMTUuNCwyNDUuOCwyNTYgICBDNTA0LjcsMzk4LjIsMzk0LjcsNTA3LjgsMjU4LjksNTA3LjJ6IE00MC4yLDI1Ny45YzAuOSwxMjIuNiw5Ny45LDIxOC4yLDIxNC40LDIxOS45YzEyMy42LDEuOCwyMjIuOC05NS43LDIyMy4xLTIxOS41ICAgYzAuMS0xMjIuNy05Ny44LTIxOC0yMTQuNS0yMjAuM0MxNDMuMSwzNS43LDQxLjIsMTMyLjMsNDAuMiwyNTcuOXoiLz48cGF0aCBkPSJNNDEzLjIsMjYxLjNjMCwyMS44LTAuNiw0My43LDAuMSw2NS41YzEuNSw0MS45LTI4LjcsNzYuOS02OC42LDg2LjljLTcuOCwyLTE2LjEsMy4yLTI0LjEsMy4zYy00Mi4zLDAuMy04NC42LDAuNy0xMjYuOSwwICAgYy0zNS4zLTAuNi02My4xLTE1LjYtODEuOS00Ni4xYy03LjItMTEuNy0xMC44LTI0LjctMTAuOC0zOC41Yy0wLjEtNDcuNS0wLjUtOTUsMC4xLTE0Mi40YzAuNC0zMSwxNS45LTUzLjksNDEuNi03MC4zICAgYzE2LTEwLjIsMzMuNy0xNC44LDUyLjYtMTQuOGM0MS4zLTAuMSw4Mi42LTAuNSwxMjMuOSwwLjFjMzYuNCwwLjUsNjUuMiwxNS43LDgzLjksNDcuN2M2LjcsMTEuNSwxMC4xLDI0LjIsMTAuMSwzNy43ICAgQzQxMy4xLDIxNCw0MTMuMiwyMzcuNyw0MTMuMiwyNjEuM3ogTTEyNCwyNjEuMWMwLDIyLjgsMCw0NS43LDAsNjguNWMwLDkuMSwxLjcsMTcuOSw2LDI2YzEzLjgsMjYsMzYuNCwzNy44LDY0LjksMzguMiAgIGM0MS4zLDAuNiw4Mi43LDAuMywxMjQsMGM3LjEsMCwxNC4zLTEuMiwyMS4yLTNjMjcuNS03LjQsNTAuOS0zMS4yLDUwLjEtNjYuMWMtMS00NC0wLjItODgtMC4yLTEzMmMwLTkuNy0xLjgtMTguOS02LjUtMjcuNCAgIGMtMTQuMS0yNS4zLTM2LjYtMzYuOC02NC42LTM3LjJjLTQxLjItMC42LTgyLjMtMC40LTEyMy41LDBjLTguMiwwLjEtMTYuNiwxLjYtMjQuNSw0Yy0yNi45LDguMy00OC4xLDMyLjItNDcsNjQuNCAgIEMxMjQuNiwyMTguMSwxMjQsMjM5LjYsMTI0LDI2MS4xeiIvPjxwYXRoIGQ9Ik0yNTcuMSwxODNjNDAuNy0wLjEsNzMuNywzMi40LDczLjcsNzIuNGMtMC4xLDM5LjgtMzMsNzIuMy03My4zLDcyLjRjLTQwLjYsMC4xLTczLjUtMzIuMy03My41LTcyLjUgICBDMTg0LDIxNS40LDIxNi42LDE4My4xLDI1Ny4xLDE4M3ogTTI1Ny4xLDIwNi4yYy0yNy40LDAuMS01MCwyMi40LTQ5LjksNDkuM3MyMi42LDQ5LDUwLjIsNDkuMWMyNy41LDAsNTAuMS0yMi4xLDUwLjItNDkgICBDMzA3LjUsMjI4LjMsMjg0LjgsMjA2LjEsMjU3LjEsMjA2LjJ6Ii8+PHBhdGggZD0iTTM1NC44LDE3Ni43YzAuMiw4LjUtNi44LDE2LTE1LjEsMTYuM2MtOC41LDAuMy0xNS44LTYuOS0xNS45LTE1LjhjLTAuMS04LjcsNi42LTE2LDE0LjktMTYuMyAgIEMzNDcuMiwxNjAuNiwzNTQuNiwxNjcuOSwzNTQuOCwxNzYuN3oiLz48L2c+PC9zdmc+" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-5" id="kontak">
                <div class="m-4 text-center">
	                <h2 class="mb-3 text-white">Kontak</h2>
	                <a href="tel:+6283128339244" class="d-block border rounded-pill text-white p-3 m-2 text-decoration-none"><i class="fas fa-phone-alt"></i> 083128339244</a>
	                <a href="mailto:siska.contact@gmail.com" class="d-block border rounded-pill text-white p-3 m-2 text-decoration-none"><i class="fas fa-envelope"></i> siska.contact@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center m-auto">
                <div class="m-4 text-center">
                    <h2 class="mb-3 text-white">Alamat</h2>
                    <a href="https://www.google.com/maps/place/SMK+Negeri+1+Purwokerto/@-7.421002,109.2543996,17.11z/data=!4m5!3m4!1s0x2e655e96a7e3cc79:0x6d79bcd9709b4b6!8m2!3d-7.4216156!4d109.2544097" class="text-white text-decoration-none">Jl. DR. Soeparno No.29, Purwokerto Wetan, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53123</a>
                    <h5 class="text-white mt-3">SMK NEGERI 1 PURWOKERTO</h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
