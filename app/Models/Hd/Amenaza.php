<?php

namespace App\Models\Hd;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $niven_amenaza
 * @property string $calculo_nivel_amenaza
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property AnalisisRiesgoSocial[] $analisisRiesgoSocials
 * @property User $user
 * @property User $user
 */
class Amenaza extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hd_nivel_amenaza';

    /**
     * @var array
     */
    protected $fillable = ['niven_amenaza', 'calculo_nivel_amenaza', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
}
