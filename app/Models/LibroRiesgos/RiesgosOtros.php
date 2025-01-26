<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $social_alcance
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
 * @property LibrorConceptosOtro $librorConceptosOtro
 * @property User $user
 */
class RiesgosOtros extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_otros_alcances';

    /**
     * @var array
     */
    protected $fillable = ['social_alcance_id', 'status_delete', 'criterio', 'factores_riesgo', 'eventos_riesgo', 'contramedidas', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function librorConceptosOtro()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\ConceptosOtro', 'social_alcance');
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
