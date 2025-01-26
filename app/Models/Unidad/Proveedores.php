<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $proveedor_tipo_id
 * @property integer $id_status_delete
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $contacto
 * @property string $correo
 * @property string $rfc
 * @property string $giro_comercial
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property ProveedorContacto[] $proveedorContactos
 * @property ProveedorCuenta[] $proveedorCuentas
 * @property ProveedorDireccion[] $proveedorDireccions
 * @property ProveedorTipo $proveedorTipo
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property User $user
 */
class Proveedores extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['proveedor_tipo_id', 'id_status_delete', 'nombre', 'direccion', 'telefono', 'contacto', 'correo', 'rfc', 'giro_comercial', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorContacto()
    {
        return $this->hasMany('App\Models\Unidad\ProveedorContacto', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorCuentas()
    {
        return $this->hasMany('App\Models\Unidad\ProveedorCuentas', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedorDireccion()
    {
        return $this->hasMany('App\Models\Unidad\ProveedorDireccion', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedorTipo()
    {
        return $this->belongsTo('App\Models\Unidad\ProveedorTipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siafStatus()
    {
        return $this->belongsTo('App\Models\Unidad\SiafStatus', 'id_status_delete');
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
