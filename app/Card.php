<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Card extends Model
{

    // Table of the model
    public $table = 'cards';

    // primary key of the table
    public $primaryKey = 'card_id';

    // key type of the auto-incrementing primary key
    public $keyType = 'int';

    // Is ket auto-incrementing ?
    public $incrementing = TRUE;

    protected $fillable = [
        'user_id',
        'num_list',
        'name',
        'label',
        'description'
    ];

    public function user(): HasOne
    {
      return $this->hasOne(User::class);
    }

    public function list(): HasOne
    {
       return $this->hasOne(Lists::class, 'num_list');
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