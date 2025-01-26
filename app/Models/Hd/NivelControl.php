<?php

namespace App\Models\Hd;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $status_delete
 * @property string $nivel_control
 * @property string $exposicion
 * @property string $detalle
 * @property string $nc_calculo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class NivelControl extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hd_nivel_control';

    /**
     * @var array
     */
    protected $fillable = ['status_delete', 'nivel_control', 'exposicion', 'detalle', 'nc_calculo', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];

    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'iduserCreated');
    }
    
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'iduserUpdated');
    }
    
    public function Statusdelete()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'status_delete');
    }


}
