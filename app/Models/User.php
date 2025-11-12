<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'user'; // <- specify your table name`
    protected $primaryKey = "id";
    protected $fillable = [
        'email',
        'password',
        'create_at'
    ];
    public $timestamps = false; // disable automatic created_at/updated_at

}
