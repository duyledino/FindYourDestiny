<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Connect extends Model
{
    protected $table = 'connect';
    protected $primaryKey = 'user_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'connect_quantity',
    ];

    /**
     * Each connect record belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
