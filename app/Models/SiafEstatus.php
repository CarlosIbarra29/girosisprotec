<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $estatus
 * @property string $descripcion
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property ClienteTipoDocumento[] $clienteTipoDocumentos
 * @property User $user
 * @property User $user
 */
class SiafEstatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'siaf_status';

    /**
     * @var array
     */
    protected $fillable = ['estatus', 'descripcion', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteTipoDocumentos()
    {
        return $this->hasMany('App\Models\ClienteTipoDocumento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
