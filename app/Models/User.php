<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Ensure you're extending Authenticatable
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Extend Authenticatable for authentication
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $keyType = 'string'; // Set the correct key type for your custom ID

    protected $fillable = ['id_user', 'nama', 'no_handphone', 'role']; // Fillable attributes
}
