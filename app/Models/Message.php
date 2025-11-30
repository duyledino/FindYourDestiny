<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'message_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    protected $fillable = [
        'chat_id',
        'user_id',
        'content',
        'create_at'
    ];

    /**
     * The user who sent the message.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * The chat this message belongs to.
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'chat_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->message_id)) {
                $model->message_id = (string) Str::uuid();
            }
        });
    }

}
