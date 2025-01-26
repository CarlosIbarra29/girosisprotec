<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $unidad_id
 * @property string $numero_gps
 * @property string $marca_gps
 * @property string $modelo_gps
 * @property string $fecha_instalacion
 * @property string $info_proveedor
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Unidad $unidad
 * @property User $user
 */
class InformacionGpsUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_info_gps';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['unidad_id', 'numero_gps', 'marca_gps', 'modelo_gps', 'fecha_instalacion', 'info_proveedor', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

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
