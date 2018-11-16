<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'id', 'chore','user_id',
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

}
