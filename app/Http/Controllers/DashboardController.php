<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pendapatan (total harga dari semua transaksi)
        $collected = Transaksi::sum('total_harga');

        // Total transaksi yang masih pending (opsional, tambahkan kondisi jika ada status transaksi)
        $pending = Transaksi::whereNull('tanggal_transaksi')->sum('total_harga');

        // Total jumlah transaksi
        $totalTransactions = Transaksi::count();

        // Total jumlah pelanggan
        $totalCustomers = Pelanggan::count();

        // Semua bulan (array manual)
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];

        // Data laporan bulanan dari database
        $salesData = Transaksi::selectRaw('MONTHNAME(tanggal_transaksi) as month, SUM(total_harga) as total_sales, MONTH(tanggal_transaksi) as month_number')
            ->groupByRaw('MONTHNAME(tanggal_transaksi), MONTH(tanggal_transaksi)')
            ->orderByRaw('month_number')
            ->pluck('total_sales', 'month');

        // Gabungkan data laporan dengan semua bulan
        $monthlySalesData = collect($months)->mapWithKeys(function ($month) use ($salesData) {
            return [$month => $salesData->get($month, 0)]; // Gunakan 0 jika tidak ada data
        });

        return view('dashboard', [
            'collected' => $collected,
            'pending' => $pending,
            'totalTransactions' => $totalTransactions,
            'totalCustomers' => $totalCustomers,
            'monthlySalesData' => $monthlySalesData, // Kirim data ke view
        ]);
    }
}
