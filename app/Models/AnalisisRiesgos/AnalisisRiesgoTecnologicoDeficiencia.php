<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_tecnologico_id
 * @property string $id_deficiencia
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property AnalisisRiesgoTecnologico $analisisRiesgoTecnologico
 * @property User $user
 */
class AnalisisRiesgoTecnologicoDeficiencia extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_tecnologico_id', 'id_deficiencia', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

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
