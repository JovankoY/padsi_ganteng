<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel sesuai konvensi)
    protected $table = 'pelanggan';

    // Primary key tabel
    protected $primaryKey = 'id_pelanggan';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama',
        'no_handphone',
        'kode_ref',
        'id_status',
    ];

    // Jika tabel tidak menggunakan timestamps
    public $timestamps = false;

    // Relasi ke model Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
    public function statusKode()
    {
        return $this->belongsTo(StatusKode::class, 'id_status', 'id_status_koderef'); // Make sure foreign key and local key match
    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'id_transaksi' => 'required|string|unique:transaksi,id_transaksi',
//         'total_harga' => 'required|numeric',
//         'tanggal_transaksi' => 'required|date',
//         'nama_pesanan' => 'required|string',
//         'id_user' => 'required|exists:users,id',
//         'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan', // Nama tabel sesuai dengan database
//     ]);

//     Transaksi::create([
//         'id_transaksi' => $request->id_transaksi,
//         'total_harga' => $request->total_harga,
//         'tanggal_transaksi' => $request->tanggal_transaksi,
//         'nama_pesanan' => $request->nama_pesanan,
//         'id_user' => $request->id_user,
//         'id_pelanggan' => $request->id_pelanggan,
//     ]);

//     return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
// }

}
