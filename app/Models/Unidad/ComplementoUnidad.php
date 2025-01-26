<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_unidad
 * @property string $kilometraje
 * @property string $marca_bateria
 * @property string $marca_llantas
 * @property string $rin
 * @property string $motor
 * @property string $vestiduras
 * @property string $llantas
 * @property string $pintura
 * @property string $llanta_refaccion
 * @property string $gato
 * @property string $herramientas
 * @property string $espejo_retrovisor
 * @property string $funciona_motor
 * @property string $llaves_vehiculo
 * @property string $radio
 * @property string $bocinas
 * @property string $aire_acondicionado
 * @property string $birlos
 * @property string $tapetes
 * @property string $senalizaciones
 * @property string $elaboro
 * @property string $observaciones
 * @property integer $conteo_niv
 * @property integer $conteo_year
 * @property string $rango_km
 * @property string $registro_repuve
 * @property string $fecha_ingreso
 * @property string $fecha_salida
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Unidad $unidad
 * @property User $user
 * @property User $user
 */
class ComplementoUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'complemento_unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_unidad', 'kilometraje', 'marca_bateria', 'marca_llantas', 'rin', 'motor', 'vestiduras', 'llantas', 'pintura', 'llanta_refaccion', 'gato', 'herramientas', 'espejo_retrovisor', 'funciona_motor', 'llaves_vehiculo', 'radio', 'bocinas', 'aire_acondicionado', 'birlos', 'tapetes', 'senalizaciones', 'elaboro', 'observaciones', 'conteo_niv', 'conteo_year', 'rango_km', 'registro_repuve', 'fecha_ingreso', 'fecha_salida', 'num_gps' ,'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad\Unidad', 'id_unidad');
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
