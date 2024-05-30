<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan profil pengguna
    public function show()
    {
        $user = Auth::user();
        return view('profiles.show', compact('user'));
    }

    public function create()
    {
        return view('profiles.create');
    }


    // Menampilkan formulir edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    // Menyimpan profil pengguna
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Membuat profil baru untuk pengguna
        $profile = new Profile();
        $profile->user_id = Auth::id();
        $profile->address = $request->address;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->bio = $request->bio;

        // Mengupload gambar profil jika ada
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public', $imageName);
            $profile->profile_image = $imageName;
        }

        // Menyimpan profil pengguna
        $profile->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profiles.show')->with('success', 'Profile created successfully.');
    }

    // Mengupdate profil pengguna
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengambil profil pengguna yang akan diupdate
        $profile = Profile::findOrFail($id);

        // Mengisi data profil dengan input dari form
        $profile->address = $request->address;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->bio = $request->bio;

        // Mengupload gambar profil jika ada
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public', $imageName);
            $profile->profile_image = $imageName;
        }

        // Menyimpan data profil yang telah diupdate
        $profile->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profiles.show')->with('success', 'Profile updated successfully.');
    }
}
