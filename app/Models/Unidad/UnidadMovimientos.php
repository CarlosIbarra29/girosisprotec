<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $unidad_id
 * @property integer $asignacion_id
 * @property integer $proyectos_id
 * @property integer $ubicacion_id
 * @property integer $tipo_asignacion_id
 * @property string $fecha_asignacion
 * @property string $fecha_salida
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property Proyecto $proyecto
 * @property Unidad $unidad
 * @property UnidadTipoAsignacion $unidadTipoAsignacion
 * @property User $user
 * @property UbicacionUnidad $ubicacionUnidad
 * @property UnidadAsignacion $unidadAsignacion
 */
class UnidadMovimientos extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $table = 'unidad_movimientos';

    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['unidad_id', 'asignacion_id', 'proyectos_id', 'ubicacion_id', 'tipo_asignacion_id', 'fecha_asignacion', 'fecha_salida', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function proyecto()
    {
        return $this->belongsTo('App\Models\Unidad\Proyecto', 'proyectos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad\Unidad');
    }

    public function unidadTipoAsignacion()
    {
        return $this->belongsTo('App\Models\Unidad\TipoAsignacion', 'tipo_asignacion_id');
    }

    public function ubicacionUnidad()
    {
        return $this->belongsTo('App\Models\Unidad\UbicacionUnidad', 'ubicacion_id');
    }

    public function unidadAsignacion()
    {
        return $this->belongsTo('App\Models\Unidad\UnidadAsignacion', 'asignacion_id');
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
