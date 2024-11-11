<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Primary key khusus
    protected $keyType = 'string'; // Primary key bertipe string (jika sesuai)
    public $incrementing = false; // Non-incremental key jika id_user tidak auto-increment

    protected $fillable = [
        'id_user', 'nama', 'no_handphone', 'role',
    ];
}
