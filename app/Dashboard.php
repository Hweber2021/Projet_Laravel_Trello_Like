<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Workplace;

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

    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }

    public static function getWithWorkplace()
    {
        $workplace_id = Workplace::$primaryKey;
        return Dashboard::with('workplace')->where('workplace_id', 'LIKE', $workplace_id)->get();
    }

    public function lists()
    {
        return $this->hasMany(Lists::class);
    }
}