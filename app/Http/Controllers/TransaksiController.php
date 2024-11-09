<?php

// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Model untuk tabel transaksi
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all(); // Mengambil semua data dari tabel transaksi
        return view('transactions.index', compact('transaksis')); // Mengembalikan tampilan 'transaksi' dengan data
    }
}
