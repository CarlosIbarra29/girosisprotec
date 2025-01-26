<?php

namespace App\Models\Unidad;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_unidad
 * @property string $foto
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Unidad $unidad
 * @property User $user
 */
class FotoUnidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'foto_unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_unidad', 'foto', 'iduserCreated', 'iduserUpdated', 'created_at', 'updated_at'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
    
    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad\Unidad', 'id_unidad');
    }

}
