<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $unidad_id
 * @property integer $unidad_tipo_cobertura_id
 * @property string $nombre_titular
 * @property string $direccion_titular
 * @property string $numero_poliza
 * @property string $fecha_cobertura
 * @property string $fecha_final_cobertura
 * @property string $limites_cobertura
 * @property string $email_titutlar
 * @property string $telefono_titular
 * @property string $nombre_compania
 * @property string $telefono_compania
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property UnidadTipoCobertura $unidadTipoCobertura
 * @property User $user
 * @property Unidad $unidad
 * @property User $user
 */
class InformacionSeguroUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_info_seguro';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['unidad_id', 'unidad_tipo_cobertura_id', 'nombre_titular', 'direccion_titular', 'numero_poliza', 'fecha_cobertura', 'fecha_final_cobertura', 'limites_cobertura', 'email_titutlar', 'telefono_titular', 'nombre_compania', 'telefono_compania', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad\Unidad');
    }

    public function unidadTipoCobertura()
    {
        return $this->belongsTo('App\Models\Unidad\TipoCobertura');
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
