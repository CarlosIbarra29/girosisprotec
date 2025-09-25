<?php

namespace App\Models\Hd;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $nivel_riesgo
 * @property string $min
 * @property string $max
 * @property string $aceptabilidad
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property User $user
 */
class NivelRiesgo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hd_nivel_riesgo';

    /**
     * @var array
     */
    protected $fillable = ['nivel_riesgo', 'min', 'max', 'aceptabilidad', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }


}
