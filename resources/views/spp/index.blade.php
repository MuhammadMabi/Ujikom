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
        <h1>Data Spp</h1>
        <a href="{{ route('spp.create') }}" class="btn btn-primary">Tambah Spp</a>
    </div>

    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID spp</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spp as $k)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $k->id_spp }}</td>
                        <td>{{ $k->tahun }}</td>
                        <td>{{ $k->nominal }}</td>
                        <td>
                            <form action="{{ route('spp.delete', [$k->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('spp.edit', [$k->id]) }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete this spp?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
