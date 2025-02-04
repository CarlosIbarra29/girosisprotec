<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_tecnologico_id
 * @property string $id_impacto
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property AnalisisRiesgoTecnologico $analisisRiesgoTecnologico
 * @property User $user
 */
class AnalisisRiesgoTecnologicoImpacto extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_tecnologico_id', 'id_impacto', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function analisisRiesgoTecnologico()
    {
        return $this->belongsTo('App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologico');
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
