<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Card extends Model
{
    protected $fillable = [
        'user_id',
        'num_list',
        'label_id',
        'name',
        'description'
    ];

    public function user()
    {
        $this->belongsTo('app\User');
    }

    public function list()
    {
        $this->belongsTo('app\List');
    }

    public function label()
    {
        $this->belongsTo('app\Label');
    }
}