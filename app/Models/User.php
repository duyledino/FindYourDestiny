<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Str;
use \Illuminate\Foundation\Auth\User as Authenticatable;
use function PHPUnit\Framework\returnArgument;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $incrementing = false;   // UUID is not auto-increment
    protected $keyType = 'string';  // UUID stored as string
    public const ADMIN = 'admin';
    public const REGULAR = "regular";

    public const CREATED_AT = 'create_at';  // tell Eloquent to use your column
    public const UPDATED_AT = 'update_at';

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'user_name',
        'user_image',
        'user_gender',
        'user_address',
        'year_of_birth',
        'slogan',
        'height',
        'provider_id',
        'provider_name',
        'verify_token',
        'verify_at',
        'report_time'
    ];
    public function getUserRole()
    {
        return $this->hasOne(UserRole::class, 'user_id', 'user_id');
    }
    public function isAdmin()
    {
        return $this->getUserRole->role->role_name === self::ADMIN;
    }

    public function amount()
    {
        return $this->hasOne(AmountToConnect::class, "user_id", "user_id");
    }

    public function hobbies()
    {
        return $this->hasMany(Hobby::class, "user_id", "user_id");
    }
    public function hasHobbies()
    {
        return $this->hobbies()->exists();
    }
    public function connect()
    {
        return $this->hasOne(Connect::class, "user_id", "user_id");
    }
    public function chat()
    {
        return $this->hasMany(Chat::class, "user_id", "user_id");
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = (string) Str::uuid();
            }
        });
    }
}
