<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_unidad_tipo_documento_estatus
 * @property string $tipo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property UnidadDocumento[] $unidadDocumentos
 * @property UnidadTipoDocumentoEstatus $unidadTipoDocumentoEstatus
 * @property User $userCreated
 * @property User $userUpdated
 */
class UnidadTipoDocumento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidad_tipo_documento';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_unidad_tipo_documento_estatus', 'tipo', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadDocumentos()
    {
        return $this->hasMany('App\Models\Unidad\UnidadDocumento', 'id_unidad_tipo_documento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidadTipoDocumentoEstatus()
    {
        return $this->belongsTo('App\Models\Unidad\UnidadTipoDocumentoEstatus', 'id_unidad_tipo_documento_estatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
