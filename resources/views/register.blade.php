@extends('layouts.app')

@section('content')
    @session('error')
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endsession

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Register</h1>
            </div>
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_petugas" class="form-label">Nama</label>
                    <input name="nama_petugas" type="text" class="form-control" id="nama_petugas"
                        value="{{ $anggota->nama_petugas ?? old('nama_petugas') }}">

                    @error('nama_petugas')
                        <div class="invalid-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username"
                        value="{{ $anggota->username ?? old('username') }}">

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

                <div class="footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
