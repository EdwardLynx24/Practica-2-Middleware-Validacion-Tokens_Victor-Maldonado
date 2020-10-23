<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function mostrarComentarios(request $request, int $id=0){
        return response()->json(["request"=>$request->all(),
        "usuario"=>($id==0)?\App\Comentarios::all():\App\Comentarios::find($id),
        200]);

    }
    public function insertarNuevosComentarios(int $usuario_id,int $publicacion_id, string $texto){
        $nuevosComentarios = new Comentarios;
        $nuevosComentarios ->usuario_id=$usuario_id;
        $nuevosComentarios ->publicacion_id=$publicacion_id;
        $nuevosComentarios ->texto = $texto;
        $nuevosComentarios -> save();
        return response()->json([
            "el comentario se ingreso con exito"=> \App\Comentarios::find($nuevosComentarios->id),
        ]);
    }
    public function actualizarComentariosCompletos(int $id, int $usuario_id, int $publicacion_id, string $texto)
    {
        $comentarioActualizado = new Comentarios;
        $comentarioActualizado = Comentarios::find($id);
        $comentarioActualizado ->usuario_id = $usuario_id;
        $comentarioActualizado ->publicacion_id = $publicacion_id;
        $comentarioActualizado ->texto = $texto;
        $comentarioActualizado -> save();
        return response()->json([
            "comentarioActualizado"=> \App\Comentarios::find($comentarioActualizado->id)
        ],200);
    } 
    public function actualizarForaneaComentarios(int $id, int $usuario_id){
        $foraneaComentariosUp = new Comentarios;
        $foraneaComentariosUp = Comentarios::find($id);
        $foraneaComentariosUp ->usuario_id=$usuario_id;
        $foraneaComentariosUp->save();
        return response()->json([
            "foraneaComentariosUp"=> \App\Comentarios::find($foraneaComentariosUp->id)
        ],200);
    }
    public function actualizarForaneaComentariosPublicacion(int $id, int $usuario_id, int $publicacion_id){
        $foraneaPublicacionesUp = new Comentarios;
        $foraneaPublicacionesUp = Comentarios::find($id);
        $foraneaPublicacionesUp ->publicacion_id=$publicacion_id;
        $foraneaPublicacionesUp->save();
        return response()->json([
            "foraneaPublicacionesUp"=> \App\Comentarios::find($foraneaPublicacionesUp->id)
        ],200);
    }
    public function actualizarTextoComentarios(int $id, string $texto){
        $textoComentariosUP = new Comentarios;
        $textoComentariosUP = Comentarios::find($id);
        $textoComentariosUP ->texto=$texto;
        $textoComentariosUP->save();
        return response()->json([
            "textoComentariosUP"=> \App\Comentarios::find($textoComentariosUP->id)
        ],200);
    }
    public function eliminarComentarios(int $id){
        $eliminarComentarios = \App\Comentarios::find($id);
        $eliminarComentarios->delete();
        return response()->json([
            "publicacionEliminada"=>\App\Comentarios::find($id)
        ],200);
    }
    /* Comentarios usuarios */
    public function mostrarComentariosusuarios(int $usuario, int $comentarios=0){
        return response()->json([
            "comentarios y de una usuario"=>($comentarios == 0)?\App\Comentarios::all():
            \App\Comentarios::where('usuario_id', $usuario)->where('id',$comentarios)->get()
        ],200);
    }
    public function mostrarComentarioPublicacionusuario(int $usuario, int $publicacion, int $comentario = 0){
        return response()->json([
        "todosalv"=>($comentario == 0)?\App\Comentarios::where('publicacion_id',$publicacion)->where(
        'usuario_id',$usuario)->get():\App\Comentarios::where('id',$comentario)->where('publicacion_id',$publicacion)->where(
        'usuario_id',$usuario)->get()
        ],200);
    }
}