<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function Administracion(Request $request){
        return response()->json([
            "Administrador"=>\App\Personas::all(),
        200]);
    }
}
