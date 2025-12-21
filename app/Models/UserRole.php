<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{
    protected $table = 'user_role'; // plural to match migration
    public $timestamps = false;

    public $incrementing = false;    // composite key, not auto-increment
    protected $keyType = 'string';   // UUIDs are strings

    public const UPDATED_AT = null;
    public const CREATED_AT = null;

    protected $fillable = [
        'user_id',
        'role_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
