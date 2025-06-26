<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Menampilkan Profil Pengguna
    public function show()
    {
        $user = Auth::user();  // Ambil data pengguna yang sedang login
        return view('frontend.profile', compact('user'));  // Memanggil 'frontend.profile'
    }

    // Menampilkan Form Edit Profil
    public function edit()
    {
        $user = Auth::user();  // Ambil data pengguna yang sedang login
        return view('frontend.editprofile', compact('user'));  // Memanggil 'frontend.editprofile'
    }

    // Menampilkan Halaman untuk Mengubah Email
    public function changeEmail()
    {
        $user = Auth::user();  // Ambil data pengguna yang sedang login
        return view('frontend.change-email', compact('user')); // Memanggil 'frontend.change-email'
    }

    // Proses Update Profil
    public function update(Request $request)
    {
        $user = Auth::user();  // Ambil data pengguna yang sedang login

        // Validasi input
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'gender' => 'required|in:Pria,Wanita,Lainnya',
            'birthdate' => 'required|date',
            'country' => 'nullable|string|max:255',
        ]);

        // Update data pengguna
        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'nickname' => $validated['nickname'] ?? $user->nickname,
            'gender' => $validated['gender'],
            'birthdate' => $validated['birthdate'],
            'country' => $validated['country'] ?? $user->country,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('frontend.profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
