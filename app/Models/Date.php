<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Date extends Model
{
    protected $table = 'dates';
    protected $primaryKey = 'date_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string
    public $timestamps = false;

    protected $fillable = [
        'date_id',
        'user1_id',
        'user2_id',
        'amount_to_connect',
    ];

    /**
     * First user in the date.
     */
    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user1_id', 'user_id');
    }

    /**
     * Second user in the date.
     */
    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user2_id', 'user_id');
    }

}
