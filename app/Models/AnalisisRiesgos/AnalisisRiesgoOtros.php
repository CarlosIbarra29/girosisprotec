<?php

namespace App\Models\AnalisisRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $cliente_id
 * @property integer $libror_conceptos_otros_id
 * @property integer $libror_otros_alcances_id
 * @property integer $hd_nivel_control_id
 * @property integer $status_delete
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
 * @property Cliente $cliente
 * @property LibrorConceptosOtro $librorConceptosOtro
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property HdNivelControl $hdNivelControl
 * @property LibrorOtrosAlcance $librorOtrosAlcance
 * @property User $user
 */
class AnalisisRiesgoOtros extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cliente_id', 'libror_conceptos_otros_id', 'libror_otros_alcances_id', 'hd_nivel_control_id', 'status_delete', 'punto_control', 'factores_riesgo', 'eventos_riesgo', 'recursos_expuestos', 'fuente_riesgo', 'ubicacion_riesgo', 'medidas_prevencion', 'contramedidas', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente\Cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function librorConceptosOtro()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\ConceptosOtros', 'libror_conceptos_otros_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hdNivelControl()
    {
        return $this->belongsTo('App\Models\Hd\NivelControl');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function librorOtrosAlcance()
    {
        return $this->belongsTo('App\Models\LibroRiesgos\RiesgosOtros', 'libror_otros_alcances_id');
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
