<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    public function usuarios(){
        return $this->belongsTo('\App\Usuarios');
    }
    public function publicaciones(){
        return $this->belongsTo('App\Publicaciones');
    }
}
