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
        <h1>Data Pembayaran</h1>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
    </div>

    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">ID Spp</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Batas Pembayaran</th>
                    <th scope="col">Jumlah Bulan</th>
                    <th scope="col">Nominal Bayar</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $k)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $k->nisn }}</td>
                        <td>{{ $k->id_spp }}</td>
                        <td>{{ $k->tgl_bayar }}</td>
                        <td>{{ $k->batas_pembayaran }}</td>
                        <td>{{ $k->jumlah_bulan }}</td>
                        <td>{{ $k->nominal_bayar }}</td>
                        <td>{{ $k->jumlah_bayar }}</td>
                        <td>{{ $k->kembalian }}</td>
                        <td>
                            @if ($k->status === 'Belum Lunas')
                                <span class="badge bg-danger">{{ $k->status }}</span>
                            @elseif ($k->status === 'Sudah Lunas')
                                <span class="badge bg-success">{{ $k->status }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $k->status }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('pembayaran.delete', [$k->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('pembayaran.edit', [$k->id]) }}" class="btn btn-success">Edit</a>

                                @if ($k->status === 'Belum Lunas')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this pembayaran?')">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
