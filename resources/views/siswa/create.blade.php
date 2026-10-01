@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form siswa</h1>
    </div>

    <form action="{{ route('siswa.createOrUpdate') }}" method="POST">
        @csrf

        <input type="text" name="id" value="{{ $siswa->id ?? '' }}" hidden>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input name="nisn" type="text" class="form-control" id="nisn"
                value="{{ $siswa->nisn ?? old('nisn') }}">

            @error('nisn')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama"
                value="{{ $siswa->nama ?? old('nama') }}">

            @error('nama')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Id kelas</label>
            <select class="form-select" aria-label="Select buku" id="id_kelas" name="id_kelas">
                <option default>Pilih kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id_kelas }}"
                        {{ collect($siswa->id_kelas ?? old('id_kelas'))->contains($k->id_kelas) ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}</option>
                @endforeach
            </select>

            @error('id_kelas')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input name="nama_kelas" type="text" class="form-control" id="nama_kelas"
                value="{{ $siswa->nama_kelas ?? old('nama_kelas') }}" disabled>

            @error('nama_kelas')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat">{{ $siswa->alamat ?? old('alamat') }}</textarea>

            @error('alamat')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input name="no_telp" type="text" class="form-control" id="no_telp"
                value="{{ $siswa->no_telp ?? old('no_telp') }}">

            @error('no_telp')
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
                        {{ collect($siswa->id_spp ?? old('id_spp'))->contains($s->id_spp) ? 'selected' : '' }}>
                        {{ $s->id_spp }}</option>
                @endforeach
            </select>

            @error('id_spp')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>

    {{-- <script>
        const idKelasSelect = document.getElementById('id_kelas');
        const namaKelasInput = document.getElementById('nama_kelas');

        idKelasSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const selectedNamaKelas = selectedOption.text;

            namaKelasInput.value = selectedNamaKelas;
        });
    </script> --}}
@endsection
