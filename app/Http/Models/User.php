<?php

namespace App\Http\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','family', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Http\Models\Role' , 'role_id');
    }

    public function toMessagecenter()
    {
        return $this->hasMany('App\Http\Models\MessageCenter','to_user_id');
    }

    public function fromMessagecenter()
    {
        return $this->hasMany('App\Http\Models\MessageCenter','from_user_id');
    }

    public function notification()
    {
        return $this->hasMany('App\Http\Models\Notification');
    }
}
