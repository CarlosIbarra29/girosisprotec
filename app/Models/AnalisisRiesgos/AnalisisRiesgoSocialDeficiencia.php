<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_social_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property AnalisisRiesgoSocial $analisisRiesgoSocial
 * @property User $user
 */
class AnalisisRiesgoSocialDeficiencia extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_social_id', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function analisisRiesgoSocial()
    {
        return $this->belongsTo('App\Models\AnalisisRiesgos\AnalisisRiesgoSocial');
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
