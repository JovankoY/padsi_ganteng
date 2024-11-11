<?php

// app/Models/Bahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahan'; // Nama tabel di database

    protected $fillable = [
        'id_stok', 
        'id_user', 
        'nama_barang', 
        'jenis_barang', 
        'jumlah_barang'
    ];

    public $timestamps = true; // Untuk menggunakan kolom created_at dan updated_at
    use HasFactory;

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'id_stok'; // Sesuaikan dengan kolom yang digunakan sebagai primary key

    // Jika kolom primary key bukan auto increment, set juga:
    public $incrementing = false; // Jika primary key menggunakan string seperti 'id_stok'

    // Atur tipe data kolom primary key jika diperlukan
    protected $keyType = 'string'; // Jika menggunakan string pada id_stok
}
