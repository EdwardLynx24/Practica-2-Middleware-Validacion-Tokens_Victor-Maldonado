<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuariosController extends Controller
{
    public function perfil(Request $request){
        if($request->user()->tokenCan('administrador')){
            return response()->json(["Usuario"=>$request->user()],200);
        }
        return abort(401, "Invalido Papu");
    }
    public function cerrarSesion(Request $request){
        return response()->json(["Tokens Eliminados"=>$request->user()->tokens()->delete()],200);
    }
    public function iniciarSesion(Request $request){
        $request->validate([
            'rol_id'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $usuario = Usuarios::where('email', $request->email)->first();
        if(! $usuario || ! Hash::check($request->password, $usuario->password)){
            throw ValidationException::withMessages([
                'email'=>['Correcto men'],
            ]);
        }
        if($usuario->rol_id==1){
            $token = $usuario->createToken($request->email,['usuario'])->plainTextToken;
        }elseif($usuario->rol_id==2){
            $token = $usuario->createToken($request->email,['administrador'])->plainTextToken;
        }
        return response()->json(["token"=>$token],201);
    }
    public function registro(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $usuario = new Usuarios();
        $usuario->persona_id = $request->persona_id;
        $usuario->nickname = $request->nickname;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id=$request->rol_id;
        if($usuario->save()){
            return response()->json($usuario,201);
        }
        return abort(400,"Fallo el registro :C");
    }
}
