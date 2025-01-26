<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $vehiculo_tipo
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property Unidad[] $unidads
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class UnidadTipoVehiculo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_vehiculo_tipo';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_status_delete', 'vehiculo_tipo', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidad()
    {
        return $this->hasMany('App\Models\Unidad\Unidad', 'id_vehiculo_tipo');
    }

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
}
