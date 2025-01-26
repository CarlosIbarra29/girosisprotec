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
 * @property string $convenio
 * @property string $giro_comercial
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property ProveedorTipo $proveedorTipo
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property ProveedorContacto[] $proveedorContactos
 * @property ProveedorCuenta[] $proveedorCuentas
 * @property ProveedorDireccion[] $proveedorDireccions
 * @property RequisicionOrdenProveedor[] $requisicionOrdenProveedors
 * @property TallerSolicitud[] $tallerSolicituds
 */
class Proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * @var array
     */
    protected $fillable = ['proveedor_tipo_id', 'id_status_delete', 'nombre', 'direccion', 'telefono', 'contacto', 'correo', 'rfc', 'convenio', 'giro_comercial', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    public function siafStatus()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'id_status_delete');
    }

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }


    public function proveedorTipo()
    {
        return $this->belongsTo('App\Models\Unidad\ProveedorTipo');
    }


    public function proveedorContactos()
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function RequisicionOrdenProveedor()
    {
        return $this->hasMany('App\Models\Unidad\RequisicionOrdenProveedor', 'proveedores_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tallerSolicitud()
    {
        return $this->hasMany('App\Models\Unidad\TallerSolicitud', 'proveedores_id');
    }
}
