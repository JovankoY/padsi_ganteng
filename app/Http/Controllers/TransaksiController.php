<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

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
    {        // Validasi input dari form
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
            $kodeRef = strtoupper(Str::random(5)); // Menghasilkan kode referensi acak

            // Update kode_ref dan id_status pada pelanggan
            $pelanggan = Pelanggan::find($request->id_pelanggan);
            $pelanggan->kode_ref = $kodeRef;
            $pelanggan->id_status = 2; // Menandakan kode referal belum terpakai
            $pelanggan->save();
        }

        // Membuat transaksi
        $transaksi = Transaksi::create([
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_transaksi' => $request['tanggal'],
            'total_harga' => $totalBayar,
            'kode_ref' => $request['kode_ref'],
            'diskon' => $request['diskon'],
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

    public function showNota($id)
    {
        // Ambil data transaksi dan detailnya
        $transaksi = Transaksi::with('pelanggan', 'detailTransaksi.menu')
            ->findOrFail($id);

        // Hitung subtotal dari semua detail transaksi
        $subtotal = $transaksi->detailTransaksi->sum('total_harga_per_menu');

        // Inisialisasi diskon dengan 0
        $diskon = 0;

        // Cek apakah pelanggan memasukkan kode referal yang valid
        if ($transaksi->kode_ref) {
            // Cari kode referal di database yang belum terpakai (status = 2)
            $validKodeRef = Pelanggan::where('kode_ref', $transaksi->kode_ref)
                ->where('id_status', 2) // Status 2 berarti belum terpakai
                ->first();

            // Jika kode referal valid dan statusnya belum terpakai
            if ($validKodeRef) {
                // Beri diskon 10%
                $diskon = 0.1;

                // Update status kode referal menjadi sudah terpakai (misalnya status = 1)
                $validKodeRef->id_status = 1; // Menandakan kode referal sudah digunakan
                $validKodeRef->save();
            }
        }

        // Cek apakah pelanggan sudah mencapai transaksi ke-10 atau kelipatannya
        $jumlahTransaksiPelanggan = Transaksi::where('id_pelanggan', $transaksi->pelanggan->id_pelanggan)->count();
        if (($jumlahTransaksiPelanggan + 1) % 10 == 0) {
            // Jika transaksi ke-10 atau kelipatannya, beri diskon 100%
            $diskon = 1;
        }

        // Hitung total bayar setelah diskon
        $totalBayar = $transaksi->total_harga - ($transaksi->total_harga * $diskon);

        // Jika ada permintaan untuk mengunduh PDF
        if (request()->has('pdf')) {
            // Generate PDF nota
            $pdf = Pdf::loadView('transactions.nota', [
                'transaksi' => $transaksi,
                'subtotal' => $subtotal,
                'diskon' => $diskon * 100, // Menampilkan diskon dalam persen
                'totalBayar' => $totalBayar,
            ]);
            return $pdf->download('nota_' . $transaksi->id_transaksi . '.pdf');
        }

        // Tampilkan tampilan nota untuk ditampilkan di browser
        return view('transactions.nota', [
            'transaksi' => $transaksi,
            'subtotal' => $subtotal,
            'diskon' => $diskon * 100, // Menampilkan diskon dalam persen
            'totalBayar' => $totalBayar,
        ]);
    }

    
}
