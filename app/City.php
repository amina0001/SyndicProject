<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id','state_id', 'name','pcode'
    ];

    public function state()
    {
        return $this->belongsTo('App\state', 'state_id', 'id');
    }
	
}