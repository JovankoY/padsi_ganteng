<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';


    protected $fillable = [
        'total_harga',
        'tanggal_transaksi',
        'id_user',
        'id_pelanggan'
    ];
    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Foreign key disesuaikan
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan'); // Foreign key disesuaikan
    }

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}
