<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $analisis_riesgo_social_id
 * @property string $id_impacto
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property User $user
 * @property LibrorBarrerasPerimetrale $librorBarrerasPerimetrale
 */
class Impactos extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'analisis_riesgo_social_impactos';

    /**
     * @var array
     */
    protected $fillable = ['analisis_riesgo_social_id', 'id_impacto','created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }

}
