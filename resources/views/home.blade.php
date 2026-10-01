@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-3">
        <h1>Selamat Datang, {{ Auth::user()->nama_petugas }}!</h1>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Siswa Yang Sudah Lunas</h5>
                    <h1>Total: {{ $sudahLunas->count() }} Siswa</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Siswa Yang Belum Lunas</h5>
                    <h1>Total: {{ $belumLunas->count() }} Siswa</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
