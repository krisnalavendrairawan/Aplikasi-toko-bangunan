<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', ['produk' => $produk]);
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk' => 'required|max:255',
            'harga' =>   'required|min:1',
            'stok' => 'required|min:1',
        ]);

        Produk::create($validatedData);

        return redirect('/dashboard/produk')->with('toast_success', 'Post created successfully!');
    }

    public function edit(Produk $produk)
    {

        return view('produk.edit', [
            'produk' => $produk
        ]);
    }

    public function destroy(Produk $produk)
    {

        try {
            Produk::destroy($produk->id);

            return redirect('/dashboard/produk')->with('toast_success', 'Produk has been deleted!');
        } catch (Exception $e) {
            return redirect('/dashboard/produk')->with('toast_error', 'Produk Memiliki Data Transaksi!');
        }
        
    }

    public function update(Request $request, Produk $produk)
    {

        $rules = [
            'produk' => 'required|max:255',
            'harga' => 'required|min:1',
            'stok' => 'required|min:1',
        ];

        $validatedData = $request->validate($rules);
        Produk::updateOrCreate(['id' => $produk->id])->update($validatedData);

        return redirect('/dashboard/produk')->with('success', 'Produk has been updated!');
    }
}
