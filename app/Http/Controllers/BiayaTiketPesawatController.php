<?php

namespace App\Http\Controllers;

use App\Models\BiayaTiketPesawat;
use App\Models\Kota;
use Illuminate\Http\Request;

class BiayaTiketPesawatController extends Controller
{
    public function index()
    {
        return view('dashboard.transportasiUdara.index', [
            'title'         => 'Biaya Transportasi Udara (Pesawat)',
            'biaya'         => BiayaTiketPesawat::orderBy('asal', 'asc')->get(),
            'kota'          => Kota::orderBy('nama_kota', 'asc')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'asal'       => 'required|max:255',
            'tujuan'     => 'required|max:255',
            'besaran'    => 'numeric|gt:-1|required',
        ]);

        BiayaTiketPesawat::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function show(BiayaTiketPesawat $biayaTiketPesawat)
    {
        //
    }

    public function edit(BiayaTiketPesawat $biayaTiketPesawat)
    {
        //
    }

    public function update(Request $request, BiayaTiketPesawat $biayaTiketPesawat)
    {
        $attr = $request->validate([
            'besaran'    => 'numeric|gt:-1|required',
        ]);

        $biayaTiketPesawat->update($attr);
        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(BiayaTiketPesawat $biayaTiketPesawat)
    {
        BiayaTiketPesawat::destroy($biayaTiketPesawat->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
