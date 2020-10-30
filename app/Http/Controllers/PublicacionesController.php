<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PublicacionesController extends Controller
{
    public function mostrarPublicaciones(request $request, int $id=0){
        return response()->json(["request"=>$request->all(),
        "Persona"=>($id==0)?\App\Publicaciones::all():\App\Publicaciones::find($id),
        200]);
    }
    public function mostrarPublicacionesUsuario(){
        return response()->json([
            "Publicaciones"=>\App\Publicaciones::select('titulo as Titulo de la Publicación',
            'texto as Contenido','created_at as Fecha de Creación')->get()
        ]);
    }
    public function insertarPublicaciones(int $usuario_id,string $titulo, string $texto){
        $insercionNueva = new Publicaciones;
        $insercionNueva ->usuario_id=$usuario_id;
        $insercionNueva ->titulo=$titulo;
        $insercionNueva ->texto = $texto;
        $insercionNueva -> save();
        return response()->json([
            "la publicación se creo con exito"=> \App\Publicaciones::find($insercionNueva->id),
        ]);
    }
    public function actualizarPublicaciones(int $id, int $usuario_id, string $titulo, string $texto)
    {
        $publicacionActualizada = new Publicaciones;
        $publicacionActualizada = Publicaciones::find($id);
        $publicacionActualizada ->usuario_id = $usuario_id;
        $publicacionActualizada ->titulo = $titulo;
        $publicacionActualizada ->texto = $texto;
        $publicacionActualizada -> save();
        return response()->json([
            "publicacionActualizada"=> \App\Publicaciones::find($publicacionActualizada->id)
        ],200);
    } 
    public function actualizarForanea(int $id, int $usuario_id){
        $llaveForaneaActualizada = new Publicaciones;
        $llaveForaneaActualizada = Publicaciones::find($id);
        $llaveForaneaActualizada ->usuario_id=$usuario_id;
        $llaveForaneaActualizada->save();
        return response()->json([
            "llaveForaneaActualizada"=> \App\Publicaciones::find($llaveForaneaActualizada->id)
        ],200);
    }
    public function actualizarTitulo(int $id, string $titulo){
        $tituloActualizado = new Publicaciones;
        $tituloActualizado = Publicaciones::find($id);
        $tituloActualizado ->titulo=$titulo;
        $tituloActualizado->save();
        return response()->json([
            "tituloActualizado"=> \App\Publicaciones::find($tituloActualizado->id)
        ],200);
    }
    public function actualizarTexto(int $id, string $texto){
        $textoActualizado = new Publicaciones;
        $textoActualizado = Publicaciones::find($id);
        $textoActualizado ->texto=$texto;
        $textoActualizado->save();
        return response()->json([
            "textoActualizado"=> \App\Publicaciones::find($textoActualizado->id)
        ],200);
    }
    /* Eliminar Publicaciones */
    public function eliminarPubli(int $id){
        $eliminarPublicacion = \App\Publicaciones::find($id);
        $eliminarPublicacion->delete();
        return response()->json([
            "publicacionEliminada"=>\App\Publicaciones::find($id)
        ],200);
    }
    /* Publicaciones de una persona */
    public function publicacionPersona(int $usuario, int $publicacion = null){
        return response()->json([
            "publicacion"=>($publicacion == null)?
            \App\Publicaciones::where('usuario_id',$usuario)->get()://Publicaciones de una usuario
            \App\Publicaciones::where('usuario_id',$usuario)->where('id',$publicacion)->get()//Publicacion de una persona
        ],200);
    }
    public function mostrarBasedeDatos(){
        return response()->json([
            'Base de Datos'=>DB::table('comentarios')
            ->join('Personas','personas.id','=','comentarios.usuario_id')
            ->join('publicaciones','publicaciones.id','=','comentarios.publicacion_id')
            ->select('personas.*','publicaciones.*','comentarios.*')->get()
        ]);
    }
}
