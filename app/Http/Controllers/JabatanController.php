<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return view('dashboard.jabatan.index', [
            'title'     => 'Daftar Jabatan',
            'jabatan'   => Jabatan::all()
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'jabatan_id'        => 'required|numeric|max:20',
            'jabatan_name'      => 'required|max:255',
            'jabatan_alias'     => 'required|max:255',
        ]);

        Jabatan::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    public function show(Jabatan $jabatan)
    {
        //
    }

    public function edit(Jabatan $jabatan)
    {
        //
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $attr = $request->validate([
            'jabatan_id'        => 'numeric|max:20',
            'jabatan_name'      => 'required|max:255',
            'jabatan_alias'     => 'required|max:255',
        ]);

        $jabatan->update($attr);

        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(Jabatan $jabatan)
    {
        Jabatan::destroy($jabatan->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
