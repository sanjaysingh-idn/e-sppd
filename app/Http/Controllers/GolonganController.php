<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Http\Requests\StoreGolonganRequest;
use App\Http\Requests\UpdateGolonganRequest;

class GolonganController extends Controller
{

    public function index()
    {
        return view('dashboard.golongan.index', [
            'title'     => 'Daftar Golongan',
            'golongan'  => Golongan::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreGolonganRequest $request)
    {
        $attr = $request->validate([
            'golongan_id'       => 'required|numeric|max:20',
            'golongan_name'     => 'required|max:255',
        ]);

        $attr['golongan_name']  = strtoupper($request->golongan_name);

        Golongan::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function show(Golongan $golongan)
    {
        //
    }

    public function edit(Golongan $golongan)
    {
        //
    }

    public function update(UpdateGolonganRequest $request, Golongan $golongan)
    {
        $attr = $request->validate([
            'golongan_id'       => 'required|numeric|max:20',
            'golongan_name'     => 'required|max:255',
        ]);

        $attr['golongan_name']  = strtoupper($request->golongan_name);

        $golongan->update($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function destroy(Golongan $golongan)
    {
        Golongan::destroy($golongan->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
