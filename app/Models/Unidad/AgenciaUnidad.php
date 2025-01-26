<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_proveedor
 * @property string $razon_social
 * @property string $contacto
 * @property string $puesto
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 * @property integer $status_delete
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 */
class AgenciaUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'agencia_unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_proveedor', 'razon_social', 'contacto', 'puesto', 'direccion', 'telefono', 'correo', 'status_delete', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];
}
