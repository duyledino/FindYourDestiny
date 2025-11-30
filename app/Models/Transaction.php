<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    public const CREATED_AT = 'create_at';
    public const UPDATED_AT = null;        // KHÔNG dùng updated_at

    protected $fillable = [
        'transaction_id',
        "amount",
        "user_id",
        "amount_from",
        "amount_to",
    ];

    /**
     * The user who owns this transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->transaction_id)) {
                $model->transaction_id = (string) Str::uuid();
            }
        });
    }
}
