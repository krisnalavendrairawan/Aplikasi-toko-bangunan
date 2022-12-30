@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Penjualan</h1>
    </div>

    <div class="col-lg-8">

        <form method="post" action="/dashboard/penjualan" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal Penjualan</label>
                <input type="date" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl" autofocus value="{{ old('tgl') }}">
                @error('tgl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <label for="karyawan_id" class="form-label">ID Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" class="form-select mb-5">
                @foreach ($karyawan as $item)
                   <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
                <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
        </form>

        
    </div>

@endsection