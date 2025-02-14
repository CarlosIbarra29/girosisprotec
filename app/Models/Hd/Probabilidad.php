<?php

namespace App\Models\Hd;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $probabilidad
 * @property string $calculo_probabilidad
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property AnalisisRiesgoSocial[] $analisisRiesgoSocials
 * @property User $user
 * @property User $user
 */
class Probabilidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hd_probabilidad';

    /**
     * @var array
     */
    protected $fillable = ['probabilidad', 'calculo_probabilidad', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
