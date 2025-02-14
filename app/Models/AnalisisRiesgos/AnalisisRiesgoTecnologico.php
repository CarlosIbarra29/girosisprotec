<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $cliente_id
 * @property integer $libror_conceptos_tecnologicos_id
 * @property integer $libror_tecnologicos_alcances_id
 * @property integer $hd_nivel_control_id
 * @property integer $status_delete
 * @property integer $hd_consecuencia_id
 * @property integer $hd_probabilidad_id
 * @property string $punto_control
 * @property string $factores_riesgo
 * @property string $eventos_riesgo
 * @property string $recursos_expuestos
 * @property string $fuente_riesgo
 * @property string $ubicacion_riesgo
 * @property string $medidas_prevencion
 * @property string $contramedidas
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property LibrorConceptosTecnologico $librorConceptosTecnologico
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property HdConsecuencium $hdConsecuencium
 * @property HdProbabilidad $hdProbabilidad
 * @property LibrorTecnologicosAlcance $librorTecnologicosAlcance
 * @property User $user
 * @property Cliente $cliente
 * @property HdNivelControl $hdNivelControl
 * @property AnalisisRiesgoTecnologicoDeficiencia[] $analisisRiesgoTecnologicoDeficiencias
 * @property AnalisisRiesgoTecnologicoImpacto[] $analisisRiesgoTecnologicoImpactos
 */
class AnalisisRiesgoTecnologico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'analisis_riesgo_tecnologico';

    /**
     * @var array
     */
    protected $fillable = ['cliente_id', 'libror_conceptos_tecnologicos_id', 'libror_tecnologicos_alcances_id', 'hd_nivel_control_id', 'status_delete', 'hd_consecuencia_id', 'hd_probabilidad_id', 'punto_control', 'factores_riesgo', 'eventos_riesgo', 'recursos_expuestos', 'fuente_riesgo', 'ubicacion_riesgo', 'medidas_prevencion', 'contramedidas', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated','factor_exposicion', 'nivel_riesgo'];


    public function hdConsecuencium()
    {
        return $this->belongsTo('App\Models\Hd\Consecuencia', 'hd_consecuencia_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hdProbabilidad()
    {
        return $this->belongsTo('App\Models\Hd\Probabilidad');
    }

    public function hdNivelControl()
    {
        return $this->belongsTo('App\Models\Hd\NivelControl');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function librorTecnologicosAlcance()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\RiesgosTecnologicos', 'libror_tecnologicos_alcances_id');
    }


    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function librorConceptosTecnologico()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\ConceptosTecnologicos', 'libror_conceptos_tecnologicos_id');
    }

    public function analisisRiesgoTecnologicoDeficiencias()
    {
        return $this->hasMany('App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoDeficiencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function analisisRiesgoTecnologicoImpactos()
    {
        return $this->hasMany('App\Models\AnalisisRiesgos\AnalisisRiesgoTecnologicoImpacto');
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
