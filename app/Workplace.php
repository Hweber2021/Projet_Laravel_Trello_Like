<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Workplace extends Model 
{

    // Table of the model
    public $table = 'workplaces';

    // primary key of the table
    public $primaryKey = 'workplace_id';

    // key type of the auto-incrementing primary key
    public $keyType = 'int';

    // Is ket auto-incrementing ?
    public $incrementing = TRUE;

    public $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dashboard()
    {
        return $this->hasMany(Dashboard::class);
    }

    public static function getWithUser()
    {
        return Dashboard::with('user');
    }
}