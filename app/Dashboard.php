<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Dashboard extends Model 
{
    protected $fillable = [
        'workplace_id',
        'name',
    ];

    public function workplace()
    {
        return $this->belongsTo('app\Workplace');
    }
}