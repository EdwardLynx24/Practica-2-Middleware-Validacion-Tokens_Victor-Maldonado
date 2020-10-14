<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public function comentarios(){
        return $this->hasMany('App\Comentarios');
    }
    public function publicaciones(){
        return $this->hasMany('App\Publicaciones');
    }
}
