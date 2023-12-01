<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

{{--    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}


    <title>Perpus</title>
</head>

<body class="mb-48">

<nav class="navbar  px-5 py-3 shadow">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasDarkNavbar"
             aria-labelledby="offcanvasDarkNavbarLabel">

            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Perpus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                {{---------route--}}
                <ul class="navbar-nav justify-content-end flex-grow-1 mt-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Petugas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('buku.index') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peminjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pengembalian</a>
                    </li>
                </ul>
                {{---------route--}}

            </div>

        </div>


{{--        <a class="navbar-brand" href="#">Perpus</a>--}}

        <a class="navbar-brand" href="#">Perpus</a>

        <div class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">
                User
            </a>

            <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="#">Login</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
                <li><a class="dropdown-item" href="#">Register</a></li>
            </ul>
        </div>

    </div>
</nav>
<main>
    {{----}}

    <button class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon "></span>
    </button>


    {{$slot}}
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.7.0.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>--}}
</body>

</html>
