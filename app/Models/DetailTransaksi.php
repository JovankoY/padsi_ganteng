<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\transaksi;


class DetailTransaksi extends Model
{
    protected $table = 'detailTransaksi';
    protected $fillable = ['id_menu', 'id_transaksi', 'jumlah_menu', 'total_harga_per_menu'];

    public function transaksiPenjualan()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($detail) {
            $detail->total_harga_per_menu = $detail->jumlah_menu * $detail->menu->harga_menu;
        });

        static::updating(function ($detail) {
            $detail->total_harga_per_menu = $detail->jumlah_menu * $detail->menu->harga_menu;
        });
    }
}
