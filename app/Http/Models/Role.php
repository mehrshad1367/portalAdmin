<?php

namespace app\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public $table = 'roles';

    public function user()
    {
        return $this->hasMany('App\Http\Models\User','user_id' );
    }

    public function service()
    {
        return $this->belongsToMany('App\Http\Models\Service', 'roles_services', 'role_id','service_id');
    }

    public function role_service()
    {
        return $this->belongsToMany('App\Http\Models\role_service','roles_services', 'service_id');
    }
}
