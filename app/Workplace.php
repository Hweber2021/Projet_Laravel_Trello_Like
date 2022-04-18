<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

Class Workplace extends Model 
{

    // Table of the model
    public $table = 'workplaces';

    // primary key of the table
    protected $primaryKey = 'workplace_id';

    // key type of the auto-incrementing primary key
    public $keyType = 'int';

    // Is ket auto-incrementing ?
    public $incrementing = TRUE;

    public $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dashboard()
    {
        return $this->hasMany(Dashboard::class);
    }

    public static function getWithUser()
    {
        $user_id = Auth::user()->id;
        return Workplace::with('user')->where('user_id', 'LIKE', $user_id)->get();
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