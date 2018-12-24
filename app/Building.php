<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
    	'id','name','adress_id','num_app','num_locaux'
        
    ];
/**
     * obtient le technicien du commande
     *
     * @return App\recette
     */
    public function depense()
    {
        return $this->hasMany('App\Depense', 'Building_id', 'id');
    }
    public function recetteloc()
    {
        return $this->hasMany('App\Recetteloc', 'Building_id', 'id');
    }
    public function user()
    {
        return $this->hasMany('App\User', 'appart_num', 'id');
    }
    public function adress()
    {
        return $this->belongsTo('App\Addres');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
