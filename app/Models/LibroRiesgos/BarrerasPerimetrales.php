<?php

namespace App\Models\LibroRiesgos;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $status_delete
 * @property string $alcance
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class BarrerasPerimetrales extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'libror_barreras_perimetrales';

    /**
     * @var array
     */
    protected $fillable = ['status_delete', 'alcance', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated'];


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
