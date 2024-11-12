<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    // Method untuk menampilkan daftar bahan
    public function index(Request $request)
    {
        $query = Bahan::query();

        // Cek apakah ada input pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where('nama_barang', 'like', '%' . $search . '%')
                  ->orWhere('jenis_barang', 'like', '%' . $search . '%');
        }

        $bahan = $query->get();
        return view('stock.index', compact('bahan'));
    }

    // Method untuk menampilkan form untuk membuat bahan baru
    public function create()
    {
        return view('stock.create');
    }

    // Menyimpan bahan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_stok' => 'required|string|max:10',
            'id_user' => 'required|string|max:10',
            'nama_barang' => 'required|string|max:20',
            'jenis_barang' => 'required|string|max:15',
            'jumlah_barang' => 'required|integer',
        ]);

        // Menyimpan data bahan
        Bahan::create($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('stock.index')->with('success', 'Stock berhasil ditambahkan');
    }

    // Menampilkan form edit untuk bahan dengan id tertentu
    public function edit($id_stok)
    {
        // Mencari bahan berdasarkan id_stok
        $bahan = Bahan::findOrFail($id_stok);
        return view('stock.edit', compact('bahan'));
    }

    // Memperbarui data bahan
    public function update(Request $request, $id_stok)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:20',
            'jumlah_barang' => 'required|integer',
        ]);

        // Mencari data bahan berdasarkan id_stok
        $bahan = Bahan::findOrFail($id_stok);

        // Update data bahan
        $bahan->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);

        // Redirect setelah berhasil update
        return redirect()->route('stock.index')->with('success', 'Bahan berhasil diperbarui');
    }

    // Menghapus bahan
    public function destroy($id_stok)
    {
        // Mencari dan menghapus bahan berdasarkan id_stok
        $bahan = Bahan::findOrFail($id_stok);
        $bahan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('stock.index')->with('success', 'Bahan berhasil dihapus');
    }
}
