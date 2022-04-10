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

    protected $fillable = [
        'user_id',
        'name',
    ];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function dashboard()
    {
        return $this->hasMany(Dashboard::class);
    }

    protected static function getWithUser()
    {
        return Workplace::with('user');
    }
}