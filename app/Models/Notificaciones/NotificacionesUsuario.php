<?php

namespace App\Models\Notificaciones;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre_ant
 * @property string $email_ant
 * @property string $rfc_ant
 * @property string $telefono
 * @property string $ubicacion_ant
 * @property string $rol_ant
 * @property Notificacione[] $notificaciones
 */
class NotificacionesUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notificaciones_usuario';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nombre_ant', 'email_ant', 'rfc_ant', 'telefono', 'ubicacion_ant', 'rol_ant'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notificaciones()
    {
        return $this->hasMany('App\Models\Notificaciones\Notificacione');
    }
}
