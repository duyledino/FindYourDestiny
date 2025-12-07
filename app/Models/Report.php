<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $table = 'report'; // table name
    protected $primaryKey = 'report_id'; // primary key
    public $incrementing = false; // because UUID is not auto-increment
    protected $keyType = 'string'; // UUID is stored as string
    public const CREATED_AT = 'create_at';
    public const UPDATED_AT = null;
    protected $fillable = [
        'report_id',
        'report_name',
        'user_create_id',
        'user_been_reported_name',
        'user_been_reported_id',
        'content',
        'create_at',
    ];

    /**
     * The user who created the report.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_create_id', 'user_id');
    }

    /**
     * The user who was reported.
     */
    public function reportedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_been_reported_id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->report_id)) {
                $model->report_id = (string) Str::uuid();
            }
        });
    }

}
