<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    public $incrementing = false;    // composite key, not auto-increment
    protected $keyType = 'string';   // UUIDs are strings
    protected $fillable = [
        "role_name"
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->role_id)) {
                $model->role_id = (string) Str::uuid();
            }
        });
    }
}
