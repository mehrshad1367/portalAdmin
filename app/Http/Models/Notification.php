<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];
    public $table='notifications';

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User' , 'user_id');
    }
}
