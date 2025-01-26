<?php

namespace App\Models\Notificaciones;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $users_modifico
 * @property integer $modulo_id
 * @property integer $notificaciones_tipo_id
 * @property integer $notificacion_estatus
 * @property integer $users_permiso
 * @property integer $notificaciones_usuario_id
 * @property string $notificacion
 * @property string $fecha_notificacion
 * @property string $created_at
 * @property User $user
 * @property NotificacionesEstatus $notificacionesEstatus
 * @property NotificacionesTipo $notificacionesTipo
 * @property User $user
 * @property NotificacionesModulo $notificacionesModulo
 * @property NotificacionesUsuario $notificacionesUsuario
 */
class Notificaciones extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['users_modifico', 'modulo_id', 'notificaciones_tipo_id', 'notificacion_estatus', 'users_permiso', 'notificaciones_usuario_id', 'notificacion', 'fecha_notificacion', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_permiso');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificacionesEstatus()
    {
        return $this->belongsTo('App\Models\Notificaciones\NotificacionesEstatus', 'notificacion_estatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificacionesTipo()
    {
        return $this->belongsTo('App\Models\Notificaciones\NotificacionesTipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usermodifico()
    {
        return $this->belongsTo('App\Models\User', 'users_modifico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificacionesModulo()
    {
        return $this->belongsTo('App\Models\Notificaciones\NotificacionesModulo', 'modulo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificacionesUsuario()
    {
        return $this->belongsTo('App\Models\Notificaciones\NotificacionesUsuario');
    }
}
