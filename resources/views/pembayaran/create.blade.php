@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form pembayaran</h1>
    </div>

    <form action="{{ route('pembayaran.createOrUpdate') }}" method="POST">
        @csrf

        <input type="text" name="id" value="{{ $pembayaran->id ?? '' }}" hidden>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <select class="form-select" aria-label="Select NISN" id="nisn" name="nisn">
                <option default>Pilih NISN</option>
                @foreach ($siswa as $s)
                    <option value="{{ $s->nisn }}"
                        {{ collect($pembayaran->nisn ?? old('nisn'))->contains($s->nisn) ? 'selected' : '' }}>
                        {{ $s->nisn }}</option>
                @endforeach
            </select>

            @error('nisn')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_spp" class="form-label">Id SPP</label>
            <select class="form-select" aria-label="Select buku" id="id_spp" name="id_spp">
                <option default>Pilih SPP</option>
                @foreach ($spp as $s)
                    <option value="{{ $s->id_spp }}"
                        {{ collect($pembayaran->id_spp ?? old('id_spp'))->contains($s->id_spp) ? 'selected' : '' }}>
                        {{ $s->id_spp }}</option>
                @endforeach
            </select>

            @error('id_spp')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Select status" id="status" name="status">
                <option default>Pilih status</option>
                <option value="Belum Lunas" {{ collect($pembayaran->status ?? old('status'))->contains('Belum Lunas') ? 'selected' : '' }}>
                    Belum Lunas</option>
                <option value="Sudah Lunas"
                    {{ collect($pembayaran->status ?? old('status'))->contains('Sudah Lunas') ? 'selected' : '' }}>Sudah Lunas</option>
            </select>

            @error('status')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_bayar" class="form-label">Tanggal Pembayaran</label>
            <input name="tgl_bayar" type="date" class="form-control" id="tgl_bayar"
                value="{{ $pembayaran->tgl_bayar ?? old('tgl_bayar') }}">

            @error('tgl_bayar')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_terakhir_bayar" class="form-label">Tanggal Terakhir Pembayaran</label>
            <input name="tgl_terakhir_bayar" type="date" class="form-control" id="tgl_terakhir_bayar"
                value="{{ $pembayaran->tgl_terakhir_bayar ?? old('tgl_terakhir_bayar') }}">

            @error('tgl_terakhir_bayar')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="batas_pembayaran" class="form-label">Batas Pembayaran</label>
            <input name="batas_pembayaran" type="date" class="form-control" id="batas_pembayaran"
                value="{{ $pembayaran->batas_pembayaran ?? old('batas_pembayaran') }}">

            @error('batas_pembayaran')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_bulan" class="form-label">Jumlah Bulan</label>
            <input name="jumlah_bulan" type="text" class="form-control" id="jumlah_bulan"
                value="{{ $pembayaran->jumlah_bulan ?? old('jumlah_bulan') }}">

            @error('jumlah_bulan')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal_bayar" class="form-label">Nominal Bayar</label>
            <input name="nominal_bayar" type="text" class="form-control" id="nominal_bayar"
                value="{{ $pembayaran->nominal_bayar ?? old('nominal_bayar') }}">

            @error('nominal_bayar')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
            <input name="jumlah_bayar" type="text" class="form-control" id="jumlah_bayar"
                value="{{ $pembayaran->jumlah_bayar ?? old('jumlah_bayar') }}">

            @error('jumlah_bayar')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kembalian" class="form-label">Kembalian</label>
            <input name="kembalian" type="text" class="form-control" id="kembalian"
                value="{{ $pembayaran->kembalian ?? old('kembalian') }}">

            @error('kembalian')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
