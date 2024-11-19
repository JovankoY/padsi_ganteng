<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::with('user', 'pelanggan')->paginate(10);

        // Debugging data
        \Log::info($transactions);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        $pelanggan = Pelanggan::all();

        return view('transactions.create', compact('users', 'pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|unique:transaksi,id_transaksi',
            'total_harga' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
            'nama_pesanan' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id_user',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
        ]);

        Transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_pesanan' => $request->nama_pesanan,
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
        ]);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
    }
}
