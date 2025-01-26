<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $unidad_id
 * @property string $equipamiento
 * @property string $fotografia_equipamiento
 * @property string $factura
 * @property string $fecha_factura
 * @property float $monto
 * @property integer $equipamiento_pendiente
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property Unidad $unidad
 * @property User $user
 */
class UnidadEquipamiento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_equipamiento';

    /**
     * @var array
     */
    protected $fillable = ['unidad_id', 'equipamiento', 'fotografia_equipamiento', 'factura', 'fecha_factura', 'monto', 'equipamiento_pendiente', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad\Unidad');
    }

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
