<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian, limit, dan sort dari request
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $sort = $request->input('sort', 'id_transaksi'); // Default sort by 'id'
        $direction = $request->input('direction', 'asc'); // Default direction 'asc'

        // Query detail transaksi pembelian dengan join ke bahan baku dan user
        $transaksis = Transaksi::with(['user', 'detailTransaksi'])
            ->whereHas('detailTransaksi', function ($query) use ($search) {
                $query->whereHas('menu', function ($query) use ($search) {
                    $query->where('nama_menu', 'like', "%$search%");
                });
            })->orWhereHas('user', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orderBy($sort, $direction) // Apply sorting based on user input
            ->paginate($limit); // Apply pagination

        // Jika request AJAX
        // if ($request->ajax()) {
        //     return response()->json([
        //         'penjualans' => view('penjualan.partials.penjualans', compact('penjualans'))->render(),
        //         'pagination' => $transaksis->links('pagination::tailwind')
        //     ]);
        // }

        // Jika bukan AJAX
        return view('transactions.index', compact('search', 'limit', 'sort', 'direction', 'transaksis'));
    }

    public function create()
    {
        // Mengambil semua data menu untuk ditampilkan pada form transaksi
        $menus = Menu::all();
        $pelanggan = Pelanggan::all();
        return view('transactions.create', compact('menus', 'pelanggan'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'id_user' => 'required|exists:user,id_user', // ID user yang melakukan transaksi
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan', // ID pelanggan
            'tanggal' => 'required|date', // Tanggal transaksi
            'menus' => 'required|array',
        ]);

        // Menghitung total harga dari semua menu yang dipilih
        $totalBayar = 0;
        $menuDipilih = $request->menus;

        foreach ($menuDipilih as $menu) {
            $totalBayar += $menu['subtotal'];
        }

        $jumlahTransaksiPelanggan = Transaksi::where('id_pelanggan', $request->id_pelanggan)->count();

        // Jika pelanggan sudah mencapai kelipatan 10 transaksi
        if (($jumlahTransaksiPelanggan + 1) % 10 == 0) {
            // Terapkan diskon 100% pada total harga
            $totalBayar = 0;

            // Generate kode referensi untuk pelanggan
            $kodeReferensi = strtoupper(Str::random(5)); // Menghasilkan kode referensi acak

            // Update kode_ref pada pelanggan
            $pelanggan = Pelanggan::find($request->id_pelanggan);
            $pelanggan->kode_ref = $kodeReferensi;
            $pelanggan->save();
        }

        // Membuat transaksi
        $transaksi = Transaksi::create([
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_transaksi' => $request['tanggal'],
            'total_harga' => $totalBayar,
        ]);

        // Menambahkan detail transaksi untuk setiap menu yang dipilih
        foreach ($menuDipilih as $menu) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_menu' => (int) $menu['id_menu'],
                'jumlah_menu' => $menu['jumlah'],
                'total_harga_per_menu' => $menu['subtotal'],
            ]);
        }

        // Redirect setelah sukses menyimpan transaksi
        return response()->json([
            'success' => true,
            'message' => 'Transaksi penjualan berhasil disimpan',
            'id_transaksi' => $transaksi->id_transaksi,
            
        ]);
    }
}
