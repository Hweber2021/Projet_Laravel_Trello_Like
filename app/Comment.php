<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'card_id',
        'content',
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function card()
    {
        $this->belongsTo('App\Card');
    }
}