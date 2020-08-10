<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function role()
    {
        return $this->belongsToMany('App\Http\Modeles\Role', 'roles_services', 'service_id', 'role_id');
    }
}
