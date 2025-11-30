<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'chat_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    public const CREATED_AT = 'create_at';  // tell Eloquent to use your column
    public const UPDATED_AT = 'latest_at';

    protected $fillable = [
        'chat_id',
        'user1_id',
        'user2_id',
        'create_at',
        'latest_at',
    ];

    /**
     * First participant in the chat.
     */
    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user1_id', 'user_id');
    }

    /**
     * Second participant in the chat.
     */
    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user2_id', 'user_id');
    }

}
