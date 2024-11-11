<?php

// app/Http/Controllers/BahanController.php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    // Method untuk menampilkan daftar bahan
    public function index()
    {
        $bahan = Bahan::all(); // Menampilkan semua bahan
        return view('stock.index', compact('bahan'));
    }

    // Method untuk menampilkan form untuk membuat bahan baru
    public function create()
    {
        return view('stock.create');
    }

    // Method edit untuk bahan dengan id
    public function edit($id = null)  // Tambahkan parameter $id
    {
        // Jika id diberikan, maka ambil data berdasarkan id
        if ($id) {
            $bahan = Bahan::findOrFail($id);  // Ambil data berdasarkan id
        } else {
            $bahan = Bahan::first(); // Ambil bahan pertama jika tidak ada id
        }
        
        return view('stock.edit', compact('bahan'));
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
    return redirect()->route('stock.index');
}

   // app/Http/Controllers/BahanController.php

public function update(Request $request, $id_stok)
{
    // Log data yang diterima oleh request
    \Log::info('Update Data:', $request->all());  // Menambahkan log untuk memeriksa data yang dikirim

    // Validasi input
    $request->validate([
        // 'id_stok' => 'required|string|max:10',
        // 'id_user' => 'required|string|max:10',
        'nama_barang' => 'required|string|max:20',
        // 'jenis_barang' => 'required|string|max:15',
        'jumlah_barang' => 'required|integer',
    ]);

    // Cari data bahan berdasarkan id_stok
    $bahan = Bahan::findOrFail($id_stok);  // Menggunakan $id_stok untuk mencari bahan

    // Update data bahan
    $bahan->update([
        // 'id_stok' => $request->id_stok,
        // 'id_user' => $request->id_user,
        'nama_barang' => $request->nama_barang,
        // 'jenis_barang' => $request->jenis_barang,
        'jumlah_barang' => $request->jumlah_barang,
    ]);

    // Redirect setelah berhasil update
    return redirect()->route('stock.index')->with('success', 'Bahan berhasil diperbarui');
}

    // Menghapus bahan
    public function destroy($id_stok)
    {
        // Cari bahan berdasarkan id_stok (gunakan primary key yang sesuai)
        $bahan = Bahan::findOrFail($id_stok);
    
        // Hapus data
        $bahan->delete();
    
        // Redirect kembali ke halaman daftar bahan
        return redirect()->route('stock.index');
    }
}

