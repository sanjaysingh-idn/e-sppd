<?php

namespace App\Http\Controllers;

use App\Models\MataAnggaran;
use Illuminate\Http\Request;

class MataAnggaranController extends Controller
{
    public function index()
    {
        return view('dashboard.mak.index', [
            'title'         => 'Mata Uang Anggaran',
            'mak'           => MataAnggaran::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'kode_mak'       => 'required|max:255',
            'ket'            => 'max:255',
            'input_by'       => 'required|max:255',
        ]);

        MataAnggaran::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function update(Request $request, MataAnggaran $mataAnggaran)
    {
        $attr = $request->validate([
            'kode_mak'       => 'required|max:255',
            'ket'            => 'max:255',
            'input_by'       => 'required|max:255',
        ]);

        $mataAnggaran->update($attr);
        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(MataAnggaran $mataAnggaran)
    {
        MataAnggaran::destroy($mataAnggaran->id);
        return back()->with('message', 'Data berhasil diubah');
    }
}
