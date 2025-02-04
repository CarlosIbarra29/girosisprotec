<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_otros_id
 * @property string $id_deficiencia
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property AnalisisRiesgoOtro $analisisRiesgoOtro
 * @property User $user
 * @property User $user
 */
class AnalisisRiesgoOtrosDeficiencia extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_otros_id', 'id_deficiencia', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function analisisRiesgoOtro()
    {
        return $this->belongsTo('App\Models\AnalisisRiesgos\AnalisisRiesgoOtro', 'analisis_riesgo_otros_id');
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
