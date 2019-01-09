<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetteloc extends Model
{

    use CanUpload;
    protected $table = 'recette_locaux';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'category', 'nom','description', 'price', 'date','image','building_id','id',
    ];
    /**
     * obtient
     *
     * @return App\User
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
