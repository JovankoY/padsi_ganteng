<?php

// app/Models/Bahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahan'; // Nama tabel di database

    // Jika Anda ingin mengizinkan mass assignment
    protected $fillable = [
        'id_stok', 'id_user', 'nama_barang', 'jenis_barang', 'jumlah_barang'
    ];
}
