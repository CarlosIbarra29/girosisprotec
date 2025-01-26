<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_status_delete
 * @property string $nombre_modelo
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property Unidad[] $unidads
 */
class ModeloUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modelo_unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_status_delete', 'nombre_modelo', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

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

    public function unidad()
    {
        return $this->hasMany('App\Models\Unidad\Unidad', 'id_modelo');
    }
}
