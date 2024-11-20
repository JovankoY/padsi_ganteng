<?php


namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Menu;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        // Memuat relasi menu pada data nota
        $notas = Nota::with('menu')->paginate(10);

        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        // Mengambil data relasi untuk form
        $users = User::all();
        $pelanggan = Pelanggan::all();
        $menus = Menu::all();

        return view('notas.create', compact('users', 'pelanggan', 'menus'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|unique:nota,id_transaksi',
            'id_menu' => 'required|exists:menu,id_menu',
            // 'id_user' => 'required|exists:users,id_user',
            // 'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'harga_menu' => 'required|numeric|min:0',
            'jumlah_pesanan' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Menghitung total harga
        $total_harga = $request->harga_menu * $request->jumlah_pesanan;

        // Membuat data nota baru
        Nota::create([
            'id_transaksi' => $request->id_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_menu' => $request->id_menu,
            // 'id_user' => $request->id_user,
            // 'id_pelanggan' => $request->id_pelanggan,
            'harga_menu' => $request->harga_menu,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota created successfully.');
    }
}

