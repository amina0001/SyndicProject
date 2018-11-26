<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $fillable = ['message'];

     public function notificationmsg()
    {
        return $this->hasMany('App\Notificationmsg', 'msg_id', 'id');
    }
	   public function user()
	{
	  return $this->belongsTo(User::class);
	}
}
