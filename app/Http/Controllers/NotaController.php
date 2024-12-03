<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksiPenjualan;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class NotaController extends Controller
{
    public function showNota($id)
    {
        // Ambil data transaksi dan detailnya
        $transaksi = Transaksi::with('pelanggan', 'detailTransaksi.menu')
            ->findOrFail($id);
    
        // Hitung subtotal dari semua detail transaksi
        $subtotal = $transaksi->detailTransaksi->sum('total_harga_per_menu');
    
        // Inisialisasi diskon dengan 0
        $diskon = 0;
    
        // Cek apakah pelanggan menggunakan kode referral
        if ($transaksi->pelanggan->kode_ref && $transaksi->pelanggan->kode_ref == $transaksi->kode_ref) {
            // Jika kode referal cocok, beri diskon 10%
            $diskon = 0.1;
        }
    
        // Cek apakah pelanggan sudah mencapai transaksi ke-10 atau kelipatannya
        $jumlahTransaksiPelanggan = Transaksi::where('id_pelanggan', $transaksi->pelanggan->id_pelanggan)->count();
        if ($jumlahTransaksiPelanggan % 10 == 0) {
            // Jika transaksi ke-10 atau kelipatannya, beri diskon 100%
            $diskon = 1;
        }
    
        // Hitung total bayar setelah diskon
        $totalBayar = $transaksi->total_harga - ($transaksi->total_harga * $diskon);
    
        // Tampilkan tampilan nota untuk ditampilkan di browser
        return view('transactions.nota', [
            'transaksi' => $transaksi,
            'subtotal' => $subtotal,
            'diskon' => $diskon * 100, // Menampilkan diskon dalam persen
            'totalBayar' => $totalBayar,
        ]);
    }
    
}
