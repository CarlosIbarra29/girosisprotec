<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $libror_otros_riesgos_id
 * @property integer $status_delete
 * @property string $alcance
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property AnalisisRiesgoOtro[] $analisisRiesgoOtros
 * @property LibrorOtrosRiesgo $librorOtrosRiesgo
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property LibrorOtrosAlcance[] $librorOtrosAlcances
 */
class ConceptosOtros extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_conceptos_otros';

    /**
     * @var array
     */
    protected $fillable = ['libror_otros_riesgos_id', 'status_delete', 'alcance', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function analisisRiesgoOtros()
    {
        return $this->hasMany('App\Models\LibroRiesgos\NuevoRiesgoOtros', 'libror_conceptos_otros_id');
    }

    public function Statusdelete()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'status_delete');
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
