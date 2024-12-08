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
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d')));
$endDate = Carbon::parse($request->input('end_date', Carbon::now()->format('Y-m-d')));

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

    public function printAllDataPenjualan(Request $request)
    {
        // Ambil data berdasarkan filter tanggal atau gunakan tanggal default
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d')))
            ->startOfDay();
        $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d')))
            ->endOfDay();

        // Ambil data filter berdasarkan id_member dan id_user
        $idUser = $request->input('id_user');

        // Query semua data penjualan dengan filter tanggal, id_member dan id_user
        $dataPenjualan = Transaksi::with(['user', 'detailTransaksi.menu', 'pelanggan'])
            ->whereBetween('tanggal_transaksi', [$startDate, $endDate]);

        if ($idUser) {
            // Filter berdasarkan id_user (user yang membuat penjualan)
            $dataPenjualan->where('id_user', $idUser);
        }

        // Ambil data penjualan sesuai dengan filter yang diberikan
        $dataPenjualan = $dataPenjualan->get();

        // Hitung total keseluruhan
        $totalKeseluruhan = $dataPenjualan->sum(function ($penjualan) {
            return $penjualan->detailTransaksi->sum(function ($detail) {
                return $detail->menu->harga * $detail->jumlah_menu;
            });
        });

        // Generate PDF dari data
        $pdf = PDF::loadView('laporan.print_all_penjualan', [
            'dataPenjualan' => $dataPenjualan,
            'totalKeseluruhan' => $totalKeseluruhan,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-semua-penjualan.pdf');
    }
}


