<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuarios;
use Illuminate\Validation\ValidationException;

class AutentificacionController extends Controller
{
    public function index(Request $request){
        if($request->user()->tokenCan('usuario:perfil')){
            return response()->json(["Usuario"=>$request->user()],200);
        }
        return abort(401, "Invalido Papu");
    }
    public function cerrarSesion(Request $request){
        return response()->json(["Tokens Eliminados"=>$request->user()->tokens()->delete()],200);
    }
    public function iniciarSesion(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $usuario = Usuario::where('email', $request->email)->first();
        if(! $usuario || ! Hash::check($request->password, $usuario->password)){
            throw ValidationException::withMessages([
                'email'=>['Correcto men'],
            ]);
        }
        $token = $usuario->createToken($request->email,['usuario:perfil'])->plainTextToken;
        return response()->json(["token"=>$token],201);
    }
    public function registro(Request $request){
        $request->validate([
            'persona_id'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'nickname'=>'required'
        ]);
        $usuario = new Usuarios();
        $usuario->persona_id = $request->persona_id;
        $usuario->nickname = $request->nickname;
        $usuario->email = $usuario->emial;
        $usuario->password = Hash::make($request->password);
        if($usuario->save()){
            return response()->json($usuario,201);
        }
        return abort(400,"Fallo el registro :C");
    }
}
