<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $Penjualan = Penjualan::all();

        return view('penjualan.index', ['penjualan' => $Penjualan]);
    }

    public function create()
    {
        $penjualan = Penjualan::all();
        $karyawan = Karyawan::all();
        return view('penjualan.create', ['karyawan' => $karyawan, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required',
            'karyawan_id' =>   'required',
        ]);

        Penjualan::create($validatedData);

        return redirect('/dashboard/penjualan')->with('success', 'Post created successfully!');
    }

    public function edit(Penjualan $penjualan)
    {
        $karyawan = Karyawan::all();
        $penjualan = Penjualan::find($penjualan->id);
        return view('penjualan.edit', [
            'penjualan' => $penjualan, 'karyawan' => $karyawan
        ]);
    }

    public function destroy(Penjualan $penjualan)
    {
        try {
            Penjualan::destroy($penjualan->id);

            return redirect('/dashboard/penjualan')->with('toast_success', 'Penjualan has been deleted!');
        } catch (\Throwable $e) {
            return redirect('/dashboard/penjualan')->with('toast_error', 'Penjualan Masih Memiliki Data Transaksi!');
        }

        
    }

    public function update(Request $request, Penjualan $penjualan)
    {

        $rules = [
            'tgl' => 'required',
            'karyawan_id' => 'required',
        ];

        $validatedData = $request->validate($rules);
        Penjualan::updateOrCreate(['id' => $penjualan->id])->update($validatedData);

        return redirect('/dashboard/penjualan')->with('toast_success', 'Penjualan has been updated!');
    }

}
