<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Nama tabel
    protected $primaryKey = 'id_transaksi'; // Primary key
    public $incrementing = false; // Non-incrementing key
    protected $keyType = 'string'; // Tipe string untuk primary key

    protected $fillable = [
        'id_transaksi',
        'total_harga',
        'tanggal_transaksi',
        'nama_pesanan',
        'id_user',
        'id_pelanggan',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}
