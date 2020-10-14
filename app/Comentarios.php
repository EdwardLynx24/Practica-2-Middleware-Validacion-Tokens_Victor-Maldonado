<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    public function personas(){
        return $this->belongsTo('App\Personas');
    }
    public function publicaciones(){
        return $this->belongsTo('App\Publicaciones');
    }
}
