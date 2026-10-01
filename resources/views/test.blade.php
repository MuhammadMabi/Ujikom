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

    <div class="row">
        <div class="col-md-3 bg-dark">

        </div>
        <div class="col-md-9">
            <div class="container mt-5 mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam enim voluptate similique ipsam delectus
                aliquid ducimus, ex impedit rem earum a ad? Nostrum velit voluptates ratione libero facilis accusamus
                nisi quisquam optio autem nobis, deserunt atque inventore excepturi debitis quod veritatis ipsum. Qui
                necessitatibus autem, maxime deleniti deserunt repellat nesciunt beatae numquam. Eligendi, impedit iure
                id repudiandae nisi necessitatibus quam illum soluta ducimus qui, pariatur facere cumque iusto? Nulla
                sapiente eum alias neque laudantium excepturi perspiciatis iusto officiis necessitatibus quod, suscipit
                labore inventore amet cum! Ipsam voluptas dolorum ullam illo, ex nam fugit non earum, sequi repellendus
                iusto laudantium reprehenderit excepturi nihil vitae quaerat vero delectus sint aspernatur perspiciatis.
                Animi magnam dolor repellat! Odio quas voluptatem sit illum, ipsam repellendus fugiat suscipit quo
                dolores soluta ea quos laboriosam doloribus aut. Consectetur rem earum illo dicta quaerat excepturi
                maxime officiis nihil maiores nemo ad aperiam adipisci harum sequi quis aliquid fuga cupiditate, facilis
                alias quasi dolorum, iste quidem a inventore. Distinctio veritatis est quia officiis aliquam dicta
                inventore explicabo repudiandae dolore numquam suscipit quibusdam, magni minima nobis iusto placeat at
                cum quae quaerat fugiat reprehenderit tenetur consequuntur corrupti. Repellat repudiandae odio dolores
                asperiores, minus hic! Architecto suscipit laudantium itaque delectus nulla! Atque cum excepturi non
                exercitationem? Assumenda omnis quidem mollitia, sit saepe aut? Saepe maxime excepturi nihil. Amet,
                fugit tenetur. Consectetur nesciunt provident officia quos accusantium doloribus mollitia debitis non
                expedita vel, amet molestiae pariatur tempora nihil quidem nam sint sapiente iure? Excepturi, aperiam
                illo possimus eveniet quasi perspiciatis modi nostrum quod tempora voluptatum voluptate. Dolore.
            </div>
        </div>
    </div>

    {{-- <div class="container mt-5 mb-5">
        @yield('content')
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum aperiam, reprehenderit temporibus expedita at
        voluptatum, ab, odit vero nostrum cupiditate officia atque facilis animi. Necessitatibus molestias fugit
        deserunt ullam quos quisquam possimus quod hic sit! Repellendus praesentium quasi aliquid tempore sequi,
        provident facere eaque? Voluptates fugit culpa, distinctio minus, corrupti praesentium obcaecati saepe eligendi
        corporis, quis expedita! Deserunt, sit! Numquam nesciunt perferendis unde totam sequi cumque, rerum inventore?
        Ad voluptates perferendis obcaecati fugit laboriosam consectetur. Quibusdam hic porro commodi cumque ducimus
        debitis sed minima magnam vel minus cupiditate suscipit, aliquid fuga eveniet ea laborum rerum nihil aut!
        Accusantium, rerum tempore repudiandae ex dolorum sequi deserunt nihil quaerat, fuga modi ab ut praesentium
        ratione labore, est voluptatem nobis beatae! Nisi, maiores eos. Deleniti quaerat incidunt ut delectus, non velit
        tenetur doloribus vitae culpa totam dolor labore magni veniam, debitis eos! Expedita incidunt accusantium quam
        ipsam magnam corporis ipsa repellat beatae placeat. Hic vitae non, maxime eligendi repellendus placeat cum eaque
        veritatis dolore corporis sint quae nisi mollitia ratione? Autem a sequi ea similique necessitatibus
        perferendis. Molestiae eum soluta atque, voluptatem ducimus aperiam nobis. Atque possimus recusandae temporibus
        laudantium. Veniam animi inventore dignissimos sequi unde dolore delectus. Autem modi nam perferendis, aliquid,
        doloremque facilis ipsum quam rerum soluta dolores ut libero aliquam reiciendis illo amet earum! Accusantium
        voluptates consequatur rem! Eius vel magnam at fuga nobis velit alias possimus asperiores! Fuga porro vitae
        molestiae mollitia delectus fugit doloremque cum placeat, modi cumque! At consequatur dicta placeat maiores
        ducimus tenetur possimus dolor vero.
    </div> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script> --}}

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
