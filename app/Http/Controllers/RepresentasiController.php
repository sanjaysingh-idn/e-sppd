<?php

namespace App\Http\Controllers;

use App\Models\Representasi;
use App\Models\Golongan;
use Illuminate\Http\Request;

class RepresentasiController extends Controller
{
    public function index()
    {
        return view('dashboard.representasi.index', [
            'title'         => 'Uang Representasi',
            'representasi'  => Representasi::all(),
            'golongan'      => golongan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'pangkat'        => 'required|max:255|unique:representasis,pangkat',
            'luar_kota'      => 'numeric|required|gt:0',
            'dalam_kota'     => 'numeric|required|gt:0',
        ]);

        Representasi::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function update(Request $request, Representasi $representasi)
    {
        $attr = $request->validate([
            'pangkat'        => 'required|max:255|unique:representasis,pangkat,' . $representasi->id,
            'luar_kota'      => 'numeric|required|gt:0',
            'dalam_kota'     => 'numeric|required|gt:0',
        ]);

        $representasi->update($attr);

        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(Representasi $representasi)
    {
        Representasi::destroy($representasi->id);
        return back()->with('message', 'Data berhasil diubah');
    }
}
