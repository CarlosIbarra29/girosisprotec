<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $tipo_asignacion
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property User $user
 */
class TipoAsignacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_tipo_asignacion';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_status_delete', 'tipo_asignacion', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

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
