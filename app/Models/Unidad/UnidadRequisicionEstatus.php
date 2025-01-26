<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $estatus_unidad
 * @property Unidad[] $unidads
 */
class UnidadRequisicionEstatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_requisicion_estatus';

    /**
     * @var array
     */
    protected $fillable = ['estatus_unidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidads()
    {
        return $this->hasMany('App\Models\Unidad\Unidad');
    }
}
