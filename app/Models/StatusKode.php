<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKode extends Model
{
    use HasFactory;

    protected $table = 'status_kode_ref'; // Nama tabel di database
    protected $primaryKey = 'id_status_kode'; // Primary key khusus

    protected $fillable = [
        'nama_status',
    ];

    // Relasi ke model Transaksi
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_status');
    }
}
