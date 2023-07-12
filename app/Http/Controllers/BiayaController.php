<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function index()
    {
        return view('dashboard.biaya.index', [
            'title'         => 'Biaya Penginapan - Uang Harian - Biaya Taksi',
            'biaya'         => Biaya::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Biaya $biaya)
    {
        //
    }

    public function edit(Biaya $biaya)
    {
        //
    }

    public function update(Request $request, Biaya $biaya)
    {
        $attr = $request->validate([
            'luar_kota'             => 'numeric|gt:-1|required',
            'dalam_kota'            => 'numeric|gt:-1|required',
            'diklat'                => 'numeric|gt:-1|required',
            'eselon_1'              => 'numeric|gt:-1|required',
            'eselon_2'              => 'numeric|gt:-1|required',
            'eselon_3_golongan_4'   => 'numeric|gt:-1|required',
            'eselon_4_golongan_3'   => 'numeric|gt:-1|required',
            'biaya_taksi'           => 'numeric|gt:-1|required',
        ]);

        $biaya->update($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function destroy(Biaya $biaya)
    {
        //
    }
}
