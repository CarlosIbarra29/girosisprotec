<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $asignacion
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property Unidad[] $unidads
 * @property User $user
 * @property User $user
 */
class UnidadAsignacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidad_asignacion';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['asignacion', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidad()
    {
        return $this->hasMany('App\Models\Unidad\Unidad');
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
