<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetteMonth extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'recette_id', 'months','years',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
