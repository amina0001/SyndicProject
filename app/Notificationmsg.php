<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificationmsg extends Model
{
 

      protected $fillable = [
        'user_id','msg_id', 'seen','id',
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function message()
    {
        return $this->belongsTo('App\Message', 'msg_id', 'id');
    }
}
