<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /* Insercion */
    public function create(Request $request){
        $insercionNueva = new Personas;
        $insercionNueva ->nombre = $request ->nombre;
        $insercionNueva ->apellidoPaterno = $request ->apellidoPaterno;
        $insercionNueva ->apellidoMaterno = $request->apellidoMaterno;
        $insercionNueva ->edad = $request->edad;
        $insercionNueva ->sexo = $request->sexo;
        $insercionNueva -> save();
        return response()->json([
            "personaRegistrada"=> \App\Personas::find($request->id),
        ]);
    }
    /* Mostrar */
    public function show(Request $request)
    {
        return response()->json(["request"=>$request->all(),
        "Persona"=>($request->id==0)?\App\Personas::all():\App\Personas::find($request->id),
        200]);
    }
    /* Actualizaciones */
    public function actualizarNombre(int $id, string $nombre)
    {
        $nombreActualizado = new Personas;
        $nombreActualizado = Personas::find($id);
        $nombreActualizado ->nombre = $nombre;
        $nombreActualizado -> save();
        return response()->json([
            "nombreActualizado"=> \App\Personas::find($nombreActualizado->id)
        ],200);
    }    
    /* Actualizar apellidoPaterno */
    public function actualizarApellidoPaterno(int $id, string $apellidoPaterno)
    {
        $apellidoPaternoActualizado = new Personas;
        $apellidoPaternoActualizado = Personas::find($id);
        $apellidoPaternoActualizado ->apellidoPaterno = $apellidoPaterno;
        $apellidoPaternoActualizado -> save();
        return response()->json([
            "apellidoPaternoActualizado"=> \App\Personas::find($apellidoPaternoActualizado->id)
        ],200);
    }  
    /*Actaulizar Apellido Materno */
    public function actualizarApellidoMaterno(int $id, string $apellidoMaterno)
    {
        $apellidoMaternoActualizado = new Personas;
        $apellidoMaternoActualizado = Personas::find($id);
        $apellidoMaternoActualizado ->apellidoMaterno = $apellidoMaterno;
        $apellidoMaternoActualizado -> save();
        return response()->json([
            "apellidoMaternoActualizado"=> \App\Personas::find($apellidoMaternoActualizado->id)
        ],200);
    }  
    public function actualizarEdad(int $id, int $edad)
    {
        $edadActualizada = new Personas;
        $edadActualizada = Personas::find($id);
        $edadActualizada ->edad = $edad;
        $edadActualizada -> save();
        return response()->json([
            "edadActualizada"=> \App\Personas::find($edadActualizada->id)
        ],200);
    }  
    public function actualizarSexo(int $id, string $sexo)
    {
        $sexoActualizado = new Personas;
        $sexoActualizado = Personas::find($id);
        $sexoActualizado ->sexo = $sexo;
        $sexoActualizado -> save();
        return response()->json([
            "sexoActualizado"=> \App\Personas::find($sexoActualizado->id)
        ],200);
    }  
    /* Eliminaciones */
    public function eliminar(int $id){
        $eliminarPersona = \App\Personas::find($id);
        $eliminarPersona->delete();
        return response()->json([
            "personaEliminada"=>\App\Personas::find($id)
        ],200);
    }
}
