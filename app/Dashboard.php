<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Workplace;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

Class Dashboard extends Model 
{
    // Table of the model
    public $table = 'dashboards';

    // primary key of the table
    public $primaryKey = 'dashboard_id';

    // key type of the auto-incrementing primary key
    public $keyType = 'int';

    // Is ket auto-incrementing ?
    public $incrementing = TRUE;

    public $fillable = [
        'workplace_id',
        'name',
    ];

    public function workplace(): HasOne
    {
        return $this->hasOne(Workplace::class, 'workplace_id');
    }

    public static function getWithWorkplace()
    {
        return Dashboard::with('workplace')->get();
    }

    public function lists(): HasMany
    {
        return $this->hasMany(Lists::class, 'dashboard_id');
    }

    public  function getQualifiedKeyName()
    {
        return $this->getTable().'.'.$this->getKeyName();
    }

    public function getKeyName()
    {
        return $this->primaryKey;
    }

    
}