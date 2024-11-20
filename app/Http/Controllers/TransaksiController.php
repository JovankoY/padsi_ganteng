<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Menu;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Memuat data nota dengan relasi menu
        $notas = Nota::with('menu')->paginate(10);

        return view('transactions.index', compact('notas'));
    }

    public function create()
    {
        // Mengambil data pengguna, pelanggan, dan menu untuk form
        $users = User::all();
        $pelanggan = Pelanggan::all();
        $menus = Menu::all();

        return view('transactions.create', compact('users', 'pelanggan', 'menus'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_transaksi' => 'required|unique:nota,id_transaksi',
            'id_menu' => 'required|exists:menu,id_menu',
            'harga_menu' => 'required|numeric|min:0',
            'jumlah_pesanan' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Hitung total harga dan tambahkan ke dalam request
        $total_harga = $request->harga_menu * $request->jumlah_pesanan;
        $data = $request->all();
        $data['total_harga'] = $total_harga;

        // Simpan data baru ke database
        Nota::create($data);

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
