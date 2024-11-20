<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'total_harga',
        'tanggal_transaksi',
        'id_user',
        'id_pelanggan',
        'id_menu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id'); // Foreign key disesuaikan
    }

    public function nota(){
        return $this->hasMany(Nota::class, 'id_transaksi');
    }
}
