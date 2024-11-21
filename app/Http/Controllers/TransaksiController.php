<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        $notas = Nota::with('menu')->paginate(10);
        return view('transactions.index', compact('notas'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('transactions.create', compact('menus'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_transaksi' => 'required|string|max:255', // Mengubah max:999 menjadi max:255 sesuai standar string
        'tanggal_transaksi' => 'required|date',
        'menus' => 'required|array',
        'menus.*.id_menu' => 'required|exists:menu,id_menu',
        'menus.*.jumlah_pesanan' => 'required|integer|min:1',
        'uang_pembeli' => 'required|numeric|min:0',
    ]);
    dd($request->all());
    // Hitung total harga
    $total_harga = 0;
    foreach ($request->menus as $menu) {
        $menu_data = Menu::findOrFail($menu['id_menu']);
        $total_harga += $menu_data->harga * $menu['jumlah_pesanan'];
    }

    // Validasi uang pembeli
    if ($request->uang_pembeli < $total_harga) {
        return redirect()->back()->withErrors(['uang_pembeli' => 'Uang pembeli tidak cukup.']);
    }

    $kembalian = $request->uang_pembeli - $total_harga;

    // Generate ID Transaksi
    $id_transaksi = Str::uuid()->toString();

    // Simpan setiap menu ke dalam tabel Nota
    foreach ($request->menus as $menu) {
        Nota::create([
            'id_transaksi' => $id_transaksi,
            'id_menu' => $menu['id_menu'],
            'jumlah_pesanan' => $menu['jumlah_pesanan'],
            'total_harga' => $menu['jumlah_pesanan'] * Menu::find($menu['id_menu'])->harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('transaksi.index')
        ->with('success', "Transaksi berhasil ditambahkan! Kembalian: Rp " . number_format($kembalian, 0, ',', '.'));
}
}
