<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public function usuarios(){
        return $this->hasMany('\App\Usuarios');
    }
}
