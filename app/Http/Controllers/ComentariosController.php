<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function mostrarComentarios(request $request, int $id=0){
        return response()->json(["request"=>$request->all(),
        "Persona"=>($id==0)?\App\Comentarios::all():\App\Comentarios::find($id),
        200]);

    }
    public function insertarNuevosComentarios(int $persona_id,int $publicacion_id, string $texto){
        $nuevosComentarios = new Comentarios;
        $nuevosComentarios ->persona_id=$persona_id;
        $nuevosComentarios ->publicacion_id=$publicacion_id;
        $nuevosComentarios ->texto = $texto;
        $nuevosComentarios -> save();
        return response()->json([
            "el comentario se ingreso con exito"=> \App\Comentarios::find($nuevosComentarios->id),
        ]);
    }
    public function actualizarComentariosCompletos(int $id, int $persona_id, int $publicacion_id, string $texto)
    {
        $comentarioActualizado = new Comentarios;
        $comentarioActualizado = Comentarios::find($id);
        $comentarioActualizado ->persona_id = $persona_id;
        $comentarioActualizado ->publicacion_id = $publicacion_id;
        $comentarioActualizado ->texto = $texto;
        $comentarioActualizado -> save();
        return response()->json([
            "comentarioActualizado"=> \App\Comentarios::find($comentarioActualizado->id)
        ],200);
    } 
    public function actualizarForaneaComentarios(int $id, int $persona_id){
        $foraneaComentariosUp = new Comentarios;
        $foraneaComentariosUp = Comentarios::find($id);
        $foraneaComentariosUp ->persona_id=$persona_id;
        $foraneaComentariosUp->save();
        return response()->json([
            "foraneaComentariosUp"=> \App\Comentarios::find($foraneaComentariosUp->id)
        ],200);
    }
    public function actualizarForaneaComentariosPublicacion(int $id, int $persona_id, int $publicacion_id){
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
    /* Comentarios Personas */
    public function mostrarComentariosPersonas(int $persona, int $comentarios=0){
        return response()->json([
            "comentarios y de una persona"=>($comentarios == 0)?\App\Comentarios::all():
            \App\Comentarios::where('persona_id', $persona)->where('id',$comentarios)->get()
        ],200);
    }
    public function mostrarComentarioPublicacionPersona(int $persona, int $publicacion, int $comentario = 0){
        return response()->json([
        "todosalv"=>($comentario == 0)?\App\Comentarios::where('publicacion_id',$publicacion)->where(
        'persona_id',$persona)->get():\App\Comentarios::where('id',$comentario)->where('publicacion_id',$publicacion)->where(
        'persona_id',$persona)->get()
        ],200);
    }
}