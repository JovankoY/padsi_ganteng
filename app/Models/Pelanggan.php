<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'pelanggan';

    // Tentukan kolom yang dapat diisi (fillable) pada tabel
    protected $fillable = [
        'id_pelanggan',
        'nama',
        'no_handphone',
        'kode_referal',
    ];

    // Jika tabel tidak menggunakan timestamps, bisa dinonaktifkan
    public $timestamps = false;
}
