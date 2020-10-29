<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public function personas(){
        return $this-> belongsTo('App/Personas');
    }
    public function roles(){
        return $this-> belongsTo('App/Roles');
    }
    public function publicaciones(){
        return $this-> hasMany('App/Publicaciones');
    }
    public function comentarios(){
        return $this-> hasMany('App/Comentarios');
    }

}