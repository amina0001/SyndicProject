<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'description', 'category','approved', 'date','user_id','id',
    ];
       /**
     * obtient 
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
      public function notification()
    {
        return $this->hasMany('App\notification', 'reunion_id', 'id');
    }
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
