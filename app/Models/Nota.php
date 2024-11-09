<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'nota'; // Nama tabel di database
    //  

    // Jika ada kolom lain yang ingin Anda mass assign, tambahkan di sini
    protected $fillable = [
        'id_transaksi', 
        'tanggal_transaksi', 
        'jumlah_pendapatan', 
        'nama_pesanan', 
        'total_harga'
    ];
}
