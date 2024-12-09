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
        // Get all users for filter options (if necessary)
        $users = User::all();

        // Default parameter for limit
        $limit = $request->input('limit', 5);

        // Default date range (start and end date)
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d')));
        $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d')));

        // Query utama untuk transaksi dengan filter tanggal
        $query = Transaksi::with(['user', 'detailTransaksi.menu', 'pelanggan'])
            ->whereBetween('tanggal_transaksi', [$startDate, $endDate]);

        // Filter berdasarkan pencarian nama user (jika ada)
        if ($request->filled('id_user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('id_user', $request->id_user); // Filter berdasarkan id_user
            });
        }
        

        // Ambil data laporan dengan pagination
        $laporanPenjualan = $query->paginate($limit)->appends([
            'id_user' => $request->id_user, // Mengappend id_user ke URL untuk pagination
            'limit' => $limit,
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
        ]);

        // Return view dengan data
        return view('laporan.index', compact('laporanPenjualan', 'users', 'startDate', 'endDate'));
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
        $idUser = $request->input('id');

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
