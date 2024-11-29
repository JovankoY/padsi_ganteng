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
        'id_user', 
        'nama_barang', 
        'jenis_barang', 
        'jumlah_barang'
    ];

    public $timestamps = true; // Untuk menggunakan kolom created_at dan updated_at
    use HasFactory;

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'id_bahan'; // Sesuaikan dengan kolom yang 
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
