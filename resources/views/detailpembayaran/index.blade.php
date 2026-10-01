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
        <h1>Detail Pembayaran</h1>
        <a href="{{ route('detailpembayaran.print') }}" target="_blank" class="btn btn-primary">Print</a>
    </div>

    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Tanggal Terakhir Bayar</th>
                    <th scope="col">Batas Pembayaran SPP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jumlah Bulan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Telp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailpembayaran as $cp)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $cp->nisn }}</td>
                        <td>{{ $cp->tgl_terakhir_bayar }}</td>
                        <td>{{ $cp->pembayaran->batas_pembayaran ?? 'N/A' }}</td>
                        <td>
                            @if ($cp->status_pembayaran === 'Belum Lunas')
                                <span class="badge bg-danger">{{ $cp->status_pembayaran }}</span>
                            @elseif ($cp->status_pembayaran === 'Sudah Lunas')
                                <span class="badge bg-success">{{ $cp->status_pembayaran }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $cp->status_pembayaran }}</span>
                            @endif
                        </td>
                        <td>{{ $cp->jumlah_bulan }}</td>
                        <td>{{ $cp->nama }}</td>
                        <td>{{ $cp->no_telp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
