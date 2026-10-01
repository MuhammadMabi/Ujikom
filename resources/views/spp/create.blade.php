@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Form Spp</h1>
    </div>

    <form action="{{ route('spp.createOrUpdate') }}" method="POST">
        @csrf

        <input type="text" name="id" value="{{ $spp->id ?? '' }}" hidden>

        <div class="mb-3">
            <label for="id_spp" class="form-label">Id spp</label>
            <input name="id_spp" type="text" class="form-control" id="id_spp"
                value="{{ $spp->id_spp ?? old('id_spp') }}">

            @error('id_spp')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input name="tahun" type="number" class="form-control" id="tahun"
                value="{{ $spp->tahun ?? old('tahun') }}">

            @error('tahun')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input name="nominal" type="number" class="form-control" id="nominal"
                value="{{ $spp->nominal ?? old('nominal') }}">

            @error('nominal')
                <div class="invalid-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('spp.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
