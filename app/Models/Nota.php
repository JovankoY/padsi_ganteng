<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'tanggal_transaksi',
        'id_menu', // Diganti dari 'id' ke 'id_menu'
        // 'id_user',
        // 'id_pelanggan',
        'harga_menu',
        'jumlah_pesanan',
        'total_harga',
    ];

    public $timestamps = true;

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu'); // Foreign key disesuaikan
    }

  


    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id_user');
    // }

    // public function pelanggan()
    // {
    //     return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    // }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|string|unique:transaksi,id_transaksi',
            'total_harga' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'nama_pesanan' => 'required|string',
            // 'id_user' => 'required|exists:users,id',
            // 'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan', // Nama tabel sesuai dengan database
        ]);
    
        Transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_pesanan' => $request->nama_pesanan,
            // 'id_user' => $request->id_user,
            // 'id_pelanggan' => $request->id_pelanggan,
        ]);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
    }
    
}
