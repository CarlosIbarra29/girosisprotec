<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $status_delete
 * @property string $nombre_riesgo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class NuevoRiesgoOtros extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_otros_riesgos';

    /**
     * @var array
     */
    protected $fillable = ['status_delete', 'nombre_riesgo', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }


    public function Statusdelete()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'status_delete');
    }
}
