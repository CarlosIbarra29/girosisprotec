<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $conversations_id
 * @property integer $user_id
 * @property integer $id_status_delete
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property Conversations $conversations
 * @property SiafStatus $siafStatus
 * @property User $user
 */
class Messages extends Model
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
    protected $fillable = ['conversations_id', 'user_id', 'id_status_delete', 'message', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo('App\Models\Chat\Conversations', 'conversations_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siafStatus()
    {
        return $this->belongsTo('App\Models\SiafStatus', 'id_status_delete');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
