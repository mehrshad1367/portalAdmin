<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MessageCenter extends Model
{
    protected $guarded=[];
    public $table = 'message_center';

    public function from_user() //*receive*/
    {
        return $this->belongsTo('App\Http\Models\User' , 'from_user_id');
    }

    public function user() //*receive*/
    {
        return $this->belongsTo('App\Http\Models\User' , 'user_id');
    }

    public function to_user()  //*send*/
    {
        return $this->belongsTo('App\Http\Models\User' , 'to_user_id');
    }

}
