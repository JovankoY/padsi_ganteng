<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Nama tabel di database
  
    // Jika Anda ingin mengizinkan mass assignment
    protected $fillable = [
        'id_transaksi', 'total_harga', 'tanggal_transaksi', 'nama_pesanan', 'id_user', 'id_pelanggan'
    ];
}
