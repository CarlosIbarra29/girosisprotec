<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $siaf_status_id
 * @property string $organizacion
 * @property string $nombre_comercial
 * @property string $calle
 * @property string $no_exterior
 * @property string $no_interior
 * @property string $delegacion
 * @property string $giro_comercial
 * @property string $sector
 * @property string $no_personal
 * @property string $contacto_principal
 * @property string $cargo
 * @property string $telefono
 * @property string $mail
 * @property string $created_at
 * @property string $updated_at
 * @property integer $iduserCreated
 * @property integer $iduserUpdated
 * @property User $user
 * @property User $user
 * @property SiafStatus $siafStatus
 */
class Cliente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cliente';

    /**
     * @var array
     */
    protected $fillable = ['status_delete', 'organizacion', 'nombre_comercial', 'calle', 'no_exterior', 'no_interior', 'delegacion', 'giro_comercial', 'sector', 'no_personal', 'contacto_principal', 'cargo', 'telefono', 'mail', 'created_at', 'updated_at', 'iduserCreated', 'iduserUpdated', 'persona_atiende', 'cargo_atiende', 'telefono_atiende', 'mail_atiende'];

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
