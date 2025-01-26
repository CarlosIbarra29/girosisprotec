<?php

namespace App\Models\Notificaciones;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $modulo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Notificacione[] $notificaciones
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class Notificaciones_modulo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notificacionesModulo';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_status_delete', 'modulo', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notificaciones()
    {
        return $this->hasMany('App\Models\Notificaciones\Notificaciones', 'modulo_id');
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
