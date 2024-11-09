<?php
// app/Models/Menu.php
// app/Models/Menu.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_menu', 'nama_menu', 'jenis_menu', 'harga'];
}

