<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
     protected $table = 'notification';

      protected $fillable = [
        'user_id','reunion_id', 'seen','id',
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function reunion()
    {
        return $this->belongsTo('App\Reunion', 'reunion_id', 'id');
    }
}
