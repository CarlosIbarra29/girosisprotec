<?php

namespace App\Models\Notificaciones;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $notificacion_estatus
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Notificacione[] $notificaciones
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class Notificaciones_estatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notificacionesEstatus';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_status_delete', 'notificacion_estatus', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notificaciones()
    {
        return $this->hasMany('App\Models\Notificaciones\Notificaciones', 'notificacion_estatus');
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
