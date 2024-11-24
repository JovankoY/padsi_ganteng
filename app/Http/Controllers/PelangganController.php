<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan dengan pencarian
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        // Jika ada parameter search, filter data berdasarkan nama atau nomor handphone
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_handphone', 'like', '%' . $request->search . '%');
        }

        // Ambil data pelanggan
        $pelanggan = $query->paginate(10); // Dengan pagination untuk tampilan lebih rapi

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
            'id_pelanggan' => 'required|unique:pelanggans,id_pelanggan',
            'nama' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:20',
            'kode_referal' => 'required|string|unique:pelanggan,kode_referal',
        ]);

        Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'nama' => $request->nama,
            'no_handphone' => $request->no_handphone,
            'kode_referal' => $request->kode_referal,
        ]);

        return redirect()->route('loyality.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Redeem kode referal
    public function redeemReferal(Request $request)
    {
        $request->validate([
            'kode_referal' => 'required|exists:pelanggan,kode_referal',
        ]);

        // Cari pelanggan berdasarkan kode referal
        $pelangganReferal = Pelanggan::where('kode_referal', $request->kode_referal)->first();

        if ($pelangganReferal) {
            // Pop-up hadiah
            session()->flash('success', [
                'pesan_pelanggan' => 'Selamat! Anda mendapatkan voucher makan gratis!',
                'pesan_referal' => 'Selamat! Anda mendapatkan kode voucher dari pelanggan baru!'
            ]);
        } else {
            // Jika kode tidak valid
            session()->flash('error', 'Kode referal tidak valid.');
        }

        return redirect()->route('loyality.index');
    }
}
