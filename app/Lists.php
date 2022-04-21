<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Lists extends Model 
{
    // Table of the model
    public $table = 'lists';

    // primary key of the table
    public $primaryKey = 'num_list';

    // key type of the auto-incrementing primary key
    public $keyType = 'int';

    // Is ket auto-incrementing ?
    public $incrementing = TRUE;

    public $fillable = [
        'dashboard_id',
        'name',
    ];

    public function dashboard(): HasOne
    {
        return $this->hasOne(Dashboard::class, 'dashboard_id');
    }

    public static function getWithDashboard()
    {
        return Lists::with('dashboard')->get();
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class, 'num_list');
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