<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tipo
 * @property string $nombre
 * @property User[] $users
 */
class TipoUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_usuario';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tipo', 'nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
