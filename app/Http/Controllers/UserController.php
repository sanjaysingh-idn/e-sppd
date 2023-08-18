<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $role = ['admin', 'pegawai', 'penanggung jawab kegiatan', 'pejabat pembuat komitmen', 'bendahara pengeluaran'];

        return view('dashboard.user.index', [
            'title'     => 'Daftar Akun',
            'users'     => User::all(),
            'role'      => $role,
            'jabatan'   => Jabatan::all(),
            'golongan'  => Golongan::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name'          => 'required|max:255',
            'jabatan_id'    => 'required',
            'golongan_id'   => 'required',
            'role'          => 'required',
            'nip'           => 'required|unique:users,nip|max:30',
            'contact'       => 'required|min:10|max:15',
            'email'         => 'required|email:dns|max:150|unique:users,email',
            'address'       => 'required|max:255',
            'tempat_lahir'  => 'required|max:255',
            'tgl_lahir'     => 'required',
            'password'      => 'required|string|min:8|max:255',
            'image'         => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:1024|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000,ratio=1/1',
        ]);

        $attr['password'] = Hash::make($request->password);

        if ($request->file('image')) {
            $attr['image'] = $request->file('image')->store('profile-image');
        }

        User::create($attr);

        return back()->with('message', 'Profil berhasil diupdate');
    }

    public function show(User $user)
    {
        // 
    }

    public function edit(User $user)
    {
        $role = ['admin', 'pegawai', 'penanggung jawab kegiatan', 'pejabat pembuat komitmen', 'bendahara pengeluaran'];

        return view('dashboard.user.edit', [
            'title'     => 'Edit Akun',
            'user'      => $user,
            'role'      => $role,
            'jabatan'   => Jabatan::all(),
            'golongan'  => Golongan::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $attr = $request->validate([
            'name'          => 'required|max:255',
            'jabatan_id'    => 'required',
            'golongan_id'   => 'required',
            'role'          => 'required',
            'nip'           => 'required|max:30|unique:users,nip,' . $user->id,
            'contact'       => 'required|min:10|max:15',
            'email'         => 'required|email:dns|max:150|unique:users,email,' . $user->id,
            'address'       => 'required|max:255',
            'tempat_lahir'  => 'required|max:255',
            'tgl_lahir'     => 'required',
            'image'         => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:1024',
        ]);
        if ($request->file('image')) {
            Storage::delete($user->image);
            $attr['image'] = $request->file('image')->store('profile-image');
        } else {
            $attr['image'] = $user->image;
        }

        $user->update($attr);

        return back()->with('message', 'Profil berhasil diupdate');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('message', 'User berhasil dihapus');
    }
}
