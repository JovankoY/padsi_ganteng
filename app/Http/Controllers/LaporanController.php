<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        // Default parameter
        $limit = $request->input('limit', 5); // Default limit
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d')); // Tanggal mulai default
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d')); // Tanggal akhir default

        // Query utama
        $query = Transaksi::with(['user', 'detailTransaksi.menu', 'pelanggan'])
            ->whereBetween('tanggal_transaksi', [$startDate, $endDate]); // Filter tanggal

        // Filter berdasarkan pencarian nama user
        if ($request->filled('id')) {
            $query->whereHas('user', function ($q) use ($request) {
                // Ganti 'id' dengan 'id_user' sesuai dengan relasi yang benar
                $q->where('id_user', $request->id); 
            });
        }

        // Paginate hasil
        $laporanPenjualan = $query->paginate($limit)->appends([
            'id' => $request->id,
            'limit' => $limit,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        // Pastikan variabel dikirimkan ke view
        return view('laporan.index', compact('users','laporanPenjualan', 'startDate', 'endDate', 'limit'));
    }



    public function showDetailPenjualan($id)
    {
        $laporanPenjualan = Transaksi::with(['user', 'detailTransaksi.menu'])->findOrFail($id);
        $laporanPenjualan->calculateTotalHarga();
        return view('laporan.detailPenjualan', compact('laporanPenjualan'));
    }

    public function generatePDFjual($id)
    {
        // Ambil data laporan penjualan dengan ID tertentu
        $laporanPenjualan = Transaksi::with(['user', 'detailTransaksi.menu', 'pelanggan'])->findOrFail($id);

        // Generate PDF dari tampilan Blade
        $pdf = PDF::loadView('laporan.detailPenjualan', compact('laporanPenjualan'));

        // Untuk menampilkan PDF di browser
        return $pdf->stream('laporan_penjualan.pdf');
    }
}
