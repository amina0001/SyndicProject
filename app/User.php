<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CanUpload;

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'id','firstname','photo', 'email', 'password','appart_num','lastname','cin','role','building_id'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * obtient le technicien du commande
     *
     * @return App\recette
     */
    public function recette()
    {
        return $this->hasMany('App\Recette', 'user_id', 'id');
    }
    public function reunion()
    {
        return $this->hasMany('App\Reunion', 'user_id', 'id');
    }
     public function chore()
    {
        return $this->hasMany('App\Chore', 'user_id', 'id');
    }
     public function building()
    {
        return $this->belongsTo('App\Building', 'building_id', 'id');
    }
     public function notification()
    {
        return $this->hasMany('App\notification', 'user_id', 'id');
    }
     public function notificationmsg()
    {
        return $this->hasMany('App\Notificationmsg', 'user_id', 'id');
    }
    public function messages()
    {
      return $this->hasMany(Message::class);
    }
    
}
