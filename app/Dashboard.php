<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

Class Dashboard extends Model 
{
    // Table of the model
    protected $table = 'dashboards';

    // primary key of the table
    protected $primaryKey = 'dashboard_id';

    // key type of the auto-incrementing primary key
    protected $keyType = 'int';

    // Is ket auto-incrementing ?
    protected $incrementing = TRUE;

    protected $fillable = [
        'workplace_id',
        'name',
    ];

    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }

    public static function getWithWorkplace()
    {
        return Dashboard::with('workplace');
    }
}