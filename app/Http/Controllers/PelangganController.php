<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan dengan pencarian
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        // Jika ada parameter search, filter data berdasarkan nama atau nomor handphone
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_handphone', 'like', '%' . $request->search . '%');
        }

        // Ambil data pelanggan
        $pelanggan = $query->paginate(10); // Dengan pagination untuk tampilan lebih rapi

        return view('loyality.index', compact('pelanggan'));
    }

    // Menampilkan form untuk menambahkan pelanggan baru
    public function create()
    {
        return view('loyality.create');
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:20',
            'kode_referal' => 'required|string|unique:pelanggan,kode_referal',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('loyality.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }
}
