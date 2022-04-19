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
        'name',
        'label',
        'description'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function list()
    {
        $this->belongsTo(Lists::class, 'num_list');
    }

    public function getQualifiedKeyName()
    {
        return $this->getTable().'.'.$this->getKeyName();
    }

    public function getKeyName()
    {
        return $this->primaryKey;
    }

}