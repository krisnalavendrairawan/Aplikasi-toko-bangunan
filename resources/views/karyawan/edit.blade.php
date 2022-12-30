@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Karyawan</h1>
    </div>

    <div class="col-lg-8">

        <form method="post" action="/dashboard/{{ $karyawan->id }}" class="mb-3">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $karyawan->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control  @error('gender') is-invalid @enderror" id="gender" name="gender" autofocus value="{{ old('gender', $karyawan->gender) }}">

                @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>

            <div class="mb-3">
                <label for="sandi" class="form-label">Sandi</label>
                <input type="password" class="form-control  @error('sandi') is-invalid @enderror" id="sandi" name="sandi" autofocus value="{{ old('sandi', $karyawan->sandi) }}">

                @error('sandi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            
                <button type="submit" class="btn btn-primary">Update Karyawan</button>
        </form>

        
    </div>
@endsection