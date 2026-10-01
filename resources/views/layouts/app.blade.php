<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran SPP Sekolah</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}

    <link href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .invalid-error {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>Aplikasi Pembayaran SPP Sekolah</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        @if (Auth::user()->level === 'admin')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('kelas.index') }}">Data
                                    Kelas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('spp.index') }}">Data SPP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('siswa.index') }}">Data
                                    Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('petugas.index') }}">Data
                                    Petugas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('cekpembayaran.index') }}">Cek
                                    Pembayaran</a>
                            </li>
                        @endif
                        @if (Auth::user()->level != 'siswa')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('pembayaran.index') }}">Pembayaran</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('detailpembayaran.index') }}">Detail Pembayaran</a>
                        </li>
                    @endauth
                </ul>
                @auth
                    <form class="d-flex" role="search" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        @yield('content')
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script> --}}

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
