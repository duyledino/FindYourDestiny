<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

class AmountToConnect extends Model
{
    protected $table = 'amount_connect';
    protected $primaryKey = 'amountConnect_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string

    protected $fillable = [
        'amountConnect_id',
        'amount',
        'user_id',
    ];

    /**
     * Each amount_connect record belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($model){
            if (empty($model->amountConnect_id)){
                $model->amountConnect_id = (string) Str::uuid();
            }
        });
    }
}
