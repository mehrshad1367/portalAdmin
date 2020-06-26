<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Role_Service extends Model
{
    public function role()
    {
        return $this->belongsToMany('App\Http\Modeles\Role', 'role', 'role_id');
    }

    public function service()
    {
        return $this->belongsToMany('App\Http\Modeles\Service', 'service', 'service_id');
    }
}
