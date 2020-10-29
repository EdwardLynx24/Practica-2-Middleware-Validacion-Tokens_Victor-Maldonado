<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    public function publicaciones(){
        return $this-> hasMany('App/Publicaciones');
    }
    public function comentarios(){
        return $this-> hasMany('App/Comentarios');
    }
    public function personas(){
        return $this-> belongsTo('App/Personas');
    }
    public function roles(){
        return $this-> belongsTo('App/Roles');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
