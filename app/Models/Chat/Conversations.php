<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user1_id
 * @property integer $user2_id
 * @property integer $id_status_delete
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property SiafStatus $siafStatus
 * @property User $user
 * @property User $user
 * @property Message[] $messages
 */
class Conversations extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user1_id', 'user2_id', 'id_status_delete', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siafStatus()
    {
        return $this->belongsTo('App\Models\Chat\SiafStatus', 'id_status_delete');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user1()
    {
        return $this->belongsTo('App\Models\User', 'user1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user2()
    {
        return $this->belongsTo('App\Models\User', 'user2_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Chat\Messages', 'conversations_id');
    }
}
