<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_naturales_id
 * @property string $id_impacto
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property AnalisisRiesgoNaturale $analisisRiesgoNaturale
 * @property User $user
 */
class AnalisisRiesgoNaturalesImpacto extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_naturales_id', 'id_impacto', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function analisisRiesgoNaturales()
    {
        return $this->belongsTo('App\Models\AnalisisRiesgos\AnalisisRiesgoNaturales', 'analisis_riesgo_naturales_id');
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
