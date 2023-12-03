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
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('anggota.index')}}">Anggota</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('petugas.index')}}">Petugas</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="{{ route('buku.index') }}">Buku</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="{{ route('buku.list') }}">List</a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('peminjam.index') }}">Peminjam</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('pengembalian.index') }}">Pengembalian</a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('daftar-pinjam') }}">Transaksi</a>
            </li>
        </ul>
        {{---------route--}}

    </div>

</div>
