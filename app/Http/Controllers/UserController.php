<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('users.index', compact('users')); // Mengirim data ke view
    }

    // Menampilkan form untuk membuat user baru
    public function create()
    {
        return view('users.create'); // Menampilkan form create
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|unique:users,id_user',
            'nama' => 'required',
            'no_handphone' => 'required',
            'role' => 'required',
        ]);

        // Menyimpan data user baru
        User::create($request->all());

        // Redirect setelah berhasil menambah user
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan form edit user
    public function edit($id_user)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id_user); 
        return view('users.edit', compact('user')); // Menampilkan form edit dengan data user
    }

    // Memperbarui data user
    public function update(Request $request, $id_user)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'no_handphone' => 'required',
            'role' => 'required',
        ]);

        // Mencari user berdasarkan ID
        $user = User::findOrFail($id_user);
        $user->update($request->all()); // Memperbarui data user

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus user
    public function destroy($id_user)
    {
        // Mencari dan menghapus user
        $user = User::findOrFail($id_user); 
        $user->delete(); 

        // Redirect dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    // Menampilkan detail user (show)
    public function show($id_user)
    {
        // Mencari user berdasarkan ID
        $user = User::findOrFail($id_user); 
        return view('users.show', compact('user')); // Menampilkan detail user
    }
}
