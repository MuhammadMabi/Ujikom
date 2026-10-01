@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form kelas</h1>
    </div>

    <form action="{{ route('kelas.createOrUpdate') }}" method="POST">
        @csrf

        <input type="text" name="id" value="{{ $kelas->id ?? '' }}" hidden>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Id Kelas</label>
            <input name="id_kelas" type="text" class="form-control" id="id_kelas"
                value="{{ $kelas->id_kelas ?? old('id_kelas') }}">

            @error('id_kelas')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input name="nama_kelas" type="text" class="form-control" id="nama_kelas"
                value="{{ $kelas->nama_kelas ?? old('nama_kelas') }}">

            @error('nama_kelas')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="komp_keahlian" class="form-label">Kompetensi Keahlian</label>
            <input name="komp_keahlian" type="text" class="form-control" id="komp_keahlian"
                value="{{ $kelas->komp_keahlian ?? old('komp_keahlian') }}">

            @error('komp_keahlian')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
