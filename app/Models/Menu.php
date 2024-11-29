<?php
// app/Models/Menu.php
// app/Models/Menu.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Menu extends Model
// {
//     use HasFactory;

//     protected $table = 'menu';
//     protected $primaryKey = 'id';
//     public $incrementing = true;
//     protected $keyType = 'string';

//     protected $fillable = ['id', 'nama_menu', 'jenis_menu', 'harga'];

// }

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Nama tabel di database
    protected $primaryKey = 'id_menu'; // Primary key
    protected $fillable = ['nama_menu', 'jenis_menu', 'harga']; // Kolom yang bisa diisi

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_menu'); // Foreign key disesuaikan
    }
    
}