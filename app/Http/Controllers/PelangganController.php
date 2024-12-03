<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\StatusKode;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan dengan pencarian
    public function index(Request $request)
    {
        // $status = StatusKode::all(); // Get all statuses (if needed)
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5);
        $query = Pelanggan::query();

        // If there's a search parameter, filter by name or phone number
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('no_handphone', 'like', '%' . $request->search . '%');
        }

        // Eager load the statusKode relationship to avoid N+1 query problem
        $pelanggan = $query->with(['statusKode', 'transaksi']) // Eager load statusKode dan transaksi
            ->withCount('transaksi') // Menambahkan jumlah transaksi
            ->paginate($limit);  // Eager load statusKode
        // if ($request->ajax()) {
        //     return response()->json([
        //         'pelanggan' => view('loyality.partials.pelanggan', compact('pelanggan'))->render(),
        //         'pagination' => (string) $pelanggan->links('pagination::tailwind') // Make sure links() is being called on the paginated data
        //     ]);
        // }

        return view('loyality.index', compact('pelanggan'));
    }


    // Menampilkan form untuk menambahkan pelanggan baru
    public function create()
    {
        return view('loyality.create');
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:20|unique:pelanggan,no_handphone',

        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'no_handphone' => $request->no_handphone,
            // 'kode_referal' => $request->kode_referal,
        ]);

        return redirect()->route('loyality.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Redeem kode referal
    public function redeemReferal(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'kode_referal' => 'required|exists:pelanggan,kode_ref',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
        ]);

        // Get the referral code and the customer ID
        $kodeReferal = $request->kode_referal;
        $idPelanggan = $request->id_pelanggan;

        // Check if the referral code is valid and not used
        $pelangganReferal = Pelanggan::where('kode_ref', $kodeReferal)->first();

        // Ensure the referral code belongs to a different customer (not self-redeem)
        if ($pelangganReferal->id_pelanggan == $idPelanggan) {
            return response()->json(['message' => 'Anda tidak bisa menggunakan kode referal milik Anda sendiri.'], 422);
        }

        // Check if the referral code has already been used
        if ($pelangganReferal->id_status == 3) {
            return response()->json(['message' => 'Kode referal sudah digunakan.'], 422);
        }

        // Apply the discount or other logic here, e.g., update status
        $pelangganReferal->id_status = 3; // Mark as used
        $pelangganReferal->save();

        // Return a success response with 10% discount
        return response()->json([
            'message' => 'Kode referal berhasil digunakan!',
            'diskon' => 10, // 10% discount
        ], 200);
    }
}
