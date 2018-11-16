<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addres extends Model
{
    protected $table = 'address';

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'state', 'city', 'street','id'
    ];
    public function user()
    {
        return $this->hasOne('App\Building');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
