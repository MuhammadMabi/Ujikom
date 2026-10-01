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
        <h1>Cek Pembayaran</h1>
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <form action="{{ route('cekpembayaran.search') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nisn" class="form-label">Cari pembayaran dengan memasukan NISN-mu</label>
                    <input name="nisn" type="text" class="form-control" id="nisn"
                        value="{{ $nisn ?? old('nisn') }}">

                    @error('nisn')
                        <div class="invalid-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Cari pembayaran dengan memasukan nama-mu</label>
                    <input name="nama" type="text" class="form-control" id="nama"
                        value="{{ $nama ?? old('nama') }}">

                    @error('nama')
                        <div class="invalid-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="footer">
                    <button type="submit" class="btn btn-primary">Cek Pembayaran</button>
                </div>
            </form>
        </div>

        <div class="col-md-8 card p-3">
            <div class="card-header">
                <h3>Data Hasil Pencarian</h3>
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
                        @if ($search)
                            @foreach ($cekPembayaran as $cp)
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
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 m-3">
                <div class="card-header">
                    <h3>Siswa Yang Sudah Lunas</h3>
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
                            @foreach ($sudahLunas as $sl)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $sl->nisn }}</td>
                                    <td>{{ $sl->tgl_terakhir_bayar }}</td>
                                    <td>{{ $sl->pembayaran->batas_pembayaran ?? 'N/A' }}</td>
                                    <td>
                                        @if ($sl->status_pembayaran === 'Belum Lunas')
                                            <span class="badge bg-danger">{{ $sl->status_pembayaran }}</span>
                                        @elseif ($sl->status_pembayaran === 'Sudah Lunas')
                                            <span class="badge bg-success">{{ $sl->status_pembayaran }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $sl->status_pembayaran }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $sl->jumlah_bulan }}</td>
                                    <td>{{ $sl->nama }}</td>
                                    <td>{{ $sl->no_telp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 m-3">
                <div class="card-header">
                    <h3>Siswa Yang Belum Lunas</h3>
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
                            @foreach ($belumLunas as $bl)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $bl->nisn }}</td>
                                    <td>{{ $bl->tgl_terakhir_bayar }}</td>
                                    <td>{{ $bl->pembayaran->batas_pembayaran ?? 'N/A' }}</td>
                                    <td>
                                        @if ($bl->status_pembayaran === 'Belum Lunas')
                                            <span class="badge bg-danger">{{ $bl->status_pembayaran }}</span>
                                        @elseif ($bl->status_pembayaran === 'Sudah Lunas')
                                            <span class="badge bg-success">{{ $bl->status_pembayaran }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $bl->status_pembayaran }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $bl->jumlah_bulan }}</td>
                                    <td>{{ $bl->nama }}</td>
                                    <td>{{ $bl->no_telp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
