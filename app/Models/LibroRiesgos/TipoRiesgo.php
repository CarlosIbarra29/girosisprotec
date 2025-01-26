<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tipo_riesgo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property User $user
 */
class TipoRiesgo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_tipo_riesgo';

    /**
     * @var array
     */
    protected $fillable = ['tipo_riesgo', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
