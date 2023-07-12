<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'title' => 'Profile',
        ]);
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name'      => 'required|max:255',
            'nip'       => 'required', 'unique:users,nip,' . auth()->user()->nip, 'max:30',
            'contact'   => 'required|min:10|max:15',
            'email'     => 'required|email:dns|max:150',
            'address'   => 'required|max:255',
            'image'     => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:1024|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000,ratio=1/1',
        ]);

        if ($request->file('image')) {
            Storage::delete(Auth::user()->image);
            $attr['image'] = $request->file('image')->store('profile-image');
        } else {
            $attr['image'] = Auth::user()->image;
        }

        auth()->user()->update($attr);

        return back()->with('message', 'Profil berhasil diupdate');
    }
}
