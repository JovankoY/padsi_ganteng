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
        'id_user',
        'id_pelanggan',
        'harga_menu',
        'jumlah_pesanan',
        'total_harga',
    ];

    public $timestamps = true;

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu'); // Foreign key disesuaikan
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
