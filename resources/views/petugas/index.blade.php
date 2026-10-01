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
        <h1>Data Petugas</h1>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Petugas</a>
    </div>

    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $k)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $k->username }}</td>
                        <td>{{ $k->nama_petugas }}</td>
                        <td>{{ $k->level }}</td>
                        <td>
                            <form action="{{ route('petugas.delete', [$k->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('petugas.edit', [$k->id]) }}" class="btn btn-success">Edit</a>

                                @if (Auth::user()->id != $k->id)
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this petugas?')">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
