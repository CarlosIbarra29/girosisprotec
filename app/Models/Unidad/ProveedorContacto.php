<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $proveedores_id
 * @property string $nombre
 * @property string $correo
 * @property string $telefono
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Proveedore $proveedore
 * @property User $user
 * @property User $user
 */
class ProveedorContacto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedor_contacto';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['proveedores_id', 'nombre', 'correo', 'telefono', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

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
    public function userCreated()
    {
        return $this->belongsTo('App\Models\Unidad\User', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\Unidad\User', 'iduserUpdated');
    }
}
