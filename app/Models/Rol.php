<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles_user';
    protected $fillable = [
        'nombre',
        'status_delete',
        'id_user_created',
        'id_user_update',
        'created_at',
        'updated_at'
    ];

}