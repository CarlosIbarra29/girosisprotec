<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $social_alcance_id
 * @property integer $status_delete
 * @property string $criterio
 * @property string $factores_riesgo
 * @property string $eventos_riesgo
 * @property string $contramedidas
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property LibrorConceptosNaturale $librorConceptosNaturale
 * @property User $user
 */
class RiesgosNaturales extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_naturales_alcances';

    /**
     * @var array
     */
    protected $fillable = ['social_alcance_id', 'status_delete', 'criterio', 'factores_riesgo', 'eventos_riesgo', 'contramedidas', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function librorConceptosNaturales()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\ConceptosNaturales', 'social_alcance_id');
    }

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
