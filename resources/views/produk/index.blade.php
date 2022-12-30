@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk</h1>
    </div>

        @include('sweetalert::alert')
{{-- flash message for success --}}
    @if (session()->has('success'))
      
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>

    @endif
{{-- flash message for error --}}
    @if (session()->has('error'))
      
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('error') }}
        </div>

    @endif


    <div class="table-responsive col-lg-12">
      <a href="/dashboard/produk/create" class="btn btn-primary mb-3"><span data-feather="plus-square" class="align-text-bottom" width="25"></span> Create New Produk</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($produk as $item)

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->produk }}</td>
              <td>Rp. {{ $item->harga }}</td>
              <td>{{ $item->stok }}</td>
              <td>
                <a href="/dashboard/produk/{{ $item->id }}/edit" class="btn btn-warning text-decoration-none"> <span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/produk/{{ $item->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 text-decoration-none" onclick="return confirm('are you sure?')"><span data-feather="x-circle" ><</span>Delete</button>

                </form>

              </td>
            </tr>
            
          @endforeach
            
          </tbody>
        </table>
      </div>

      

@endsection