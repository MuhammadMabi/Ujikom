@extends('layouts.app')

@section('content')
    @session('error')
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endsession
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Login</h1>
            </div>
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username"
                        value="{{ old('username') }}">

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

                <div class="footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
