@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Penjualan Has Produk</h1>
    </div>


    @if (session()->has('error'))
      
        <div class="alert alert-danger col-lg-8" role="alert">
          {{ session('error') }}
        </div>

    @endif

    <div class="col-lg-8">

        <form method="post" action="/dashboard/penjualan_has_produk" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="produk_id" class="form-label">Nama produk_id</label>
            <select name="produk_id" id="produk_id" class="form-select mb-5" onchange="total()">
                @foreach ($produk as $item)
                   <option value="{{ $item->id }}">{{ $item->produk }} | Rp.{{ $item->harga }}</option>
                @endforeach
            </select>
            </div>
            <label for="penjual_id" class="form-label">Tanggal Penjualan</label>
            <select name="penjual_id" id="penjual_id" class="form-select mb-5">
                @foreach ($penjualan as $item)
                   <option value="{{ $item->id }}">{{ $item->tgl }} | {{ $item->karyawan->nama }} </option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="Qty" class="form-label">Jumlah</label>
                <input type="text" class="form-control @error('Qty') is-invalid @enderror" id="Qty" name="Qty" autofocus value="{{ old('Qty') }}" onchange="total()">
                @error('Qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label" >Harga Total</label>
                <input type="text" class="form-control  @error('harga') is-invalid @enderror" id="harga" name="harga" autofocus value="" onchange="total()">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>

                <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
        </form>

        
    </div>


    <script>
    function total()
    {
        var sel = document.getElementById('produk_id');
        var text= sel.options[sel.selectedIndex].text;
        var harga = text.split('|')[1].split('Rp.')[1];

        var qty = document.getElementById('Qty').value;
        var total = qty * harga;
        document.getElementById('harga').value = total;
    }
</script>

@endsection