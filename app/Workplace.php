<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Workplace extends Model 
{

    // Table of the model
    protected $table = 'workplaces';

    // primary key of the table
    protected $primaryKey = 'workplace_id';

    // key type of the auto-incrementing primary key
    protected $keyType = 'int';

    // Is ket auto-incrementing ?
    protected $incrementing = TRUE;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('app\User');
    }

    public static function getWithUser()
    {
        return Dashboard::with('user');
    }
}