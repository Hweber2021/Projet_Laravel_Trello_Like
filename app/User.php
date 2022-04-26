<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name', 'surname', 'username', 'profiledp', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    /**
     * get first letter of name and surname for User profile
     */
    public function getNameSurnameLetter()
    {
        return substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1);
    }
    

    public function workplaces(): HasMany
    {
        return $this->hasMany(Workplace::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public static function getAuthenticateUser()
    {
        $user_id = Auth::user()->id;
        return User::where('id', 'LIKE', $user_id)->get();
    }
}
