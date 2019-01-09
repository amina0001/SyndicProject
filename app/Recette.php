<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use CanUpload;

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'description', 'price', 'date','image','user_id','id',
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
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
