<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $fillable = [
        'id','name', 'pcode'
    ];
       /**
     * obtient 
     *
     * @return App\City
     */
    public function city()
    {
        return $this->hasMany('App\City', 'state_id', 'id');
    }
	
  
}