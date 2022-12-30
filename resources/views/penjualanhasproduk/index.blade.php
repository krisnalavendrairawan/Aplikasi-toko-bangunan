@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjualan Has Produk</h1>
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
      <a href="/dashboard/penjualan_has_produk/create" class="btn btn-primary mb-3"><span data-feather="plus-square" class="align-text-bottom" width="25"></span> Create New Penjualan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tanggal Penjualan</th>
              <th scope="col">Nama Penjual</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($penjualanhasproduk as $item)

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->produk->produk }}</td>
              <td>{{ $item->Qty }}</td>
              <td>{{ $item->penjual->tgl }}</td>
              <td>{{ $item->penjual->karyawan->nama }}</td>
              <td>Rp. {{ $item->harga }}</td>
              <td>
                <a href="/dashboard/penjualan_has_produk/{{ $item->id }}/edit" class="btn btn-warning text-decoration-none" > <span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/penjualan_has_produk/{{ $item->id }}" method="post" class="d-inline ">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 text-decoration-none"   id="delete" ><span data-feather="x-circle"></span>Delete</button>

                </form>

              </td>
            </tr>
            
          @endforeach
            
          </tbody>
        </table>
      </div>

      

@endsection