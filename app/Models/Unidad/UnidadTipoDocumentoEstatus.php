<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $estatus
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property UnidadTipoDocumento[] $unidadTipoDocumentos
 * @property User $userCreated
 * @property User $userUpdated
 */
class UnidadTipoDocumentoEstatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidad_tipo_documento_estatus';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['estatus', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadTipoDocumentos()
    {
        return $this->hasMany('App\Models\Unidad\UnidadTipoDocumento', 'id_unidad_tipo_documento_estatus');
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
