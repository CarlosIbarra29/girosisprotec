<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $proveedores_id
 * @property string $banco
 * @property string $cuenta
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Proveedore $proveedore
 * @property User $user
 * @property User $user
 */
class ProveedorCuentas extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['proveedores_id', 'banco', 'cuenta', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedores()
    {
        return $this->belongsTo('App\Models\Unidad\Proveedores', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\Unidad\User', 'iduserUpdated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\Unidad\User', 'iduserCreated');
    }
}
