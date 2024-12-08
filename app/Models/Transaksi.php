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
        'id_pelanggan',
        'diskon',
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

    public function calculateTotalHarga()
    {
        $detailTransaksi = $this->detailTransaksi; // Ambil detail transaksi
        $totalHarga = 0;

        foreach ($detailTransaksi as $detail) {
            $totalHarga += $detail->total_harga_per_menu;
        }

        $this->total_harga = $totalHarga;
        $this->save();
    }
}
