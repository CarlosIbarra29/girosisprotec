<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $factor_exposicion
 * @property string $factor_dato
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class FactoresExposicion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hd_factor_exposicion';

    /**
     * @var array
     */
    protected $fillable = ['factor_exposicion','factor_dato', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


    public function Statusdelete()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'status_delete');
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
