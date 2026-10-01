@extends('layouts.app')

@section('content')
    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession
    
    @session('error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>

    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">ID Kelas</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">ID SPP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $k)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $k->nisn }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->id_kelas }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->no_telp }}</td>
                        <td>{{ $k->id_spp }}</td>
                        <td>
                            <form action="{{ route('siswa.delete', [$k->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('siswa.edit', [$k->id]) }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete this siswa?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
