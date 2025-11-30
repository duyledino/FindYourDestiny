<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $primaryKey = 'hobbies_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    public $timestamps = false;

    protected $fillable = [
        'hobbies_id',
        'hobbies_name',
        'user_id',
    ];

    /**
     * Each hobby belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->hobbies_id)) {
                $model->hobbies_id = (string) Str::uuid();
            }
        });
    }
}
