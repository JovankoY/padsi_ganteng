<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        // Ambil semua data pelanggan
        $pelanggan = Pelanggan::all();

        // Tampilkan view 'pelanggan.index' dan kirimkan data pelanggan
        return view('loyality.index', compact('pelanggan'));
    }

    // Tambah metode lainnya jika diperlukan, misalnya untuk membuat, mengedit, atau menghapus data pelanggan
}
