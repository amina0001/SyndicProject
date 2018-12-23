<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
 
    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'titre','description', 'price', 'date','image','building_id','id'
    ];
/**
     * obtient le technicien du commande
     *
     * @return App\building
     */
    public function building()
    {
        return $this->belongsTo('App\Building', 'building_id', 'id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
