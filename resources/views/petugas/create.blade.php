@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form Petugas</h1>
    </div>

    <form action="{{ route('petugas.createOrUpdate') }}" method="POST">
        @csrf

        <input type="text" name="id" value="{{ $petugas->id ?? '' }}" hidden>

        <div class="mb-3">
            <label for="nama_petugas" class="form-label">Nama Petugas</label>
            <input name="nama_petugas" type="text" class="form-control" id="nama_petugas"
                value="{{ $petugas->nama_petugas ?? old('nama_petugas') }}">

            @error('nama_petugas')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="username"
                value="{{ $petugas->username ?? old('username') }}">

            @error('username')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password">

            @error('password')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">

            @error('password_confirmation')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" aria-label="Select level" id="level" name="level">
                <option default>Pilih level</option>
                <option value="admin" {{ collect($petugas->level ?? old('level'))->contains('admin') ? 'selected' : '' }}>
                    Admin</option>
                <option value="petugas"
                    {{ collect($petugas->level ?? old('level'))->contains('petugas') ? 'selected' : '' }}>Petugas</option>
            </select>

            @error('level')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
