<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'gender' => 'required',
            'sandi' => 'required',
        ]);

        $validatedData['sandi'] = bcrypt($validatedData['sandi']);
        Karyawan::create($validatedData);

        return redirect('/dashboard')->with(
            'toast_success',
            'Post created successfully!'
        );
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
        ]);
    }

    public function destroy(Karyawan $karyawan)
    {
        try {
            Karyawan::destroy($karyawan->id);

            return redirect('/dashboard')->with(
                'success',
                'Karyawan has been deleted!'
            );
        } catch (Exception $e) {
            return redirect('/dashboard')->with(
                'toast_error',
                'Karyawan Masih Memiliki Data Transaksi!'
            );
        }
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $rules = [
            'nama' => 'required|max:255',
            'gender' => 'required',
            'sandi' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Karyawan::updateOrCreate(['id' => $karyawan->id])->update(
            $validatedData
        );

        return redirect('/dashboard')->with(
            'toast_success',
            'Karyawan has been updated!'
        );
    }
}
