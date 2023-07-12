<?php

namespace App\Http\Controllers;

use App\Models\BiayaTransportasiDarat;
use Illuminate\Http\Request;

class BiayaTransportasiDaratController extends Controller
{
    public function index()
    {
        return view('dashboard.transportasiDarat.index', [
            'title'         => 'Biaya Transportasi Darat',
            'biaya'         => BiayaTransportasiDarat::orderBy('nama_provinsi', 'asc')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_provinsi'         => 'required|max:255',
            'ibu_kota_provinsi'     => 'required|max:255',
            'kota'                  => 'required|max:255|unique:biaya_transportasi_darats,kota',
            'besaran'               => 'numeric|gt:-1|required',
        ]);

        BiayaTransportasiDarat::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function show(BiayaTransportasiDarat $biayaTransportasiDarat)
    {
        //
    }

    public function edit(BiayaTransportasiDarat $biayaTransportasiDarat)
    {
        //
    }

    public function update(Request $request, BiayaTransportasiDarat $biayaTransportasiDarat)
    {
        $attr = $request->validate([
            'besaran'               => 'numeric|gt:-1|required',
        ]);

        $biayaTransportasiDarat->update($attr);
        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(BiayaTransportasiDarat $biayaTransportasiDarat)
    {
        BiayaTransportasiDarat::destroy($biayaTransportasiDarat->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
