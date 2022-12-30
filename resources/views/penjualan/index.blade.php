@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjualan</h1>
    </div>
    
    @include('sweetalert::alert')

    @if (session()->has('success'))
      
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>

    @endif


    @if (session()->has('error'))
          
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('error') }}
        </div>

    @endif


    <div class="table-responsive col-lg-12">
      <a href="/dashboard/penjualan/create" class="btn btn-primary mb-3"><span data-feather="plus-square" class="align-text-bottom" width="25"></span> Create New Penjualan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($penjualan as $item)

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->tgl }}</td>
              <td>{{ $item->karyawan->nama }}</td>
              <td>
                <a href="/dashboard/penjualan/{{ $item->id }}/edit" class="btn btn-warning text-decoration-none"> <span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/penjualan/{{ $item->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 text-decoration-none" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span>Delete</button>

                </form>

              </td>
            </tr>
            
          @endforeach
            
          </tbody>
        </table>
      </div>

      

@endsection