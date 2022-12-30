<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Karyawan;
use App\Models\PenjualHasProduk;
use Illuminate\Http\Request;

class PenjualanHasProdukController extends Controller
{
    public function index()
    {
        $penjualanhasproduk = PenjualHasProduk::all();
        $penjualan = Penjualan::find('id');
        return view('penjualanhasproduk.index', ['penjualanhasproduk' => $penjualanhasproduk, 'penjualan' => $penjualan]);
    }

    public function create(){
        $produk = Produk::all();
        $penjualan = Penjualan::all();
        $penjualanhasproduk = PenjualHasProduk::all();
        return view('penjualanhasproduk.create', ['produk' => $produk, 'penjualan' => $penjualan , 'penjualanhasproduk' => $penjualanhasproduk]);
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        $produk->stok = $produk->stok - $request->Qty;
        if($produk->stok < $request->Qty){
            return redirect('/dashboard/penjualan_has_produk/create')->with('error', 'Stok tidak cukup!');
        }else{
            $produk->save();
        }

        $validatedData = $request->validate([
            'produk_id' => 'required',
            'penjual_id' =>   'required',
            'Qty' =>   'required',
            'harga' =>   'required'
        ]);

        PenjualHasProduk::create($validatedData);

        return redirect('/dashboard/penjualan_has_produk')->with('toast_success', 'Penjualan Has Produk created successfully!');
    }

    public function edit(PenjualHasProduk $penjualanhasproduk)
    {
        $penjualan = Penjualan::all();
        $produk = Produk::all();
        $penjualanhasproduk = PenjualHasProduk::find($penjualanhasproduk->id);
        return view('penjualanhasproduk.edit', [
            'penjualanhasproduk' => $penjualanhasproduk, 'produk' => $produk, 'penjualan' => $penjualan
        ]);
    }

    
    public function update(Request $request, PenjualHasProduk $penjualanhasproduk)
    {
        $produk = Produk::find($request->produk_id);
        $produk->stok = $produk->stok - $request->Qty;
        if ($produk->stok < $request->Qty) {
            return redirect('/dashboard/penjualan_has_produk/create')->with('error', 'Stok tidak cukup!');
        } else {
            $produk->save();
        }
        
        $rules = [
            'produk_id' => 'required',
            'penjual_id' =>   'required',
            'Qty' =>   'required',
            'harga' =>   'required'
        ];
        
        $validatedData = $request->validate($rules);
        PenjualHasProduk::updateOrCreate(['id' => $penjualanhasproduk->id])->update($validatedData);
        
        return redirect('/dashboard/penjualan_has_produk')->with('success', 'Penjualan_Has_Produk has been updated!');
    }
    
    public function destroy(PenjualHasProduk $penjualanhasproduk)
    {
        $kurangiStok = PenjualHasProduk::findorfail($penjualanhasproduk->id);
        $this->restoreStock($penjualanhasproduk->id);
        PenjualHasProduk::destroy($penjualanhasproduk->id);
        
        
        return redirect('/dashboard/penjualan_has_produk')->with('toast_success', 'Penjualan has been deleted!');
    }
    
    
    public function restoreStock($id){
        
        $kurangiStok = PenjualHasProduk::findorfail($id);
        $produk = Produk::find($kurangiStok->produk_id);
        $produk->stok = $produk->stok + $kurangiStok->Qty;
        $produk->save(); 
    }
}
