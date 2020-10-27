<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Gestion a Personas */
    Route::Get("/show/Personas/id/",'PersonasController@Show');//Mostrar personas
//Insertar personas
    Route::Post("/insert/Personas/",'PersonasController@create')->middleware('validad.Edad');
/*Actualizaciones*/
    Route::Put('update/Personas/{id}/nombre/{nombre}','PersonasController@actualizarNombre')
    ->where([
        'id'=>'[0-9]+',
        'nombre'=>'[a-zA-Z]+'
    ]);
    //Apellido Paterno
    Route::Put('update/Personas/{id}/apellidoPaterno/{apellidoPaterno}','PersonasController@actualizarApellidoPaterno')
    ->where([
        'id'=>'[0-9]+',
        'nombre'=>'[a-zA-Z]+'
    ]);
    //ApellidoMaterno
    Route::Put('update/Personas/{id}/apellidoMaterno/{ApellidoMaterno}','PersonasController@actualizarApellidoMaterno')
    ->where([
        'id'=>'[0-9]+',
        'nombre'=>'[a-zA-Z]+'
    ]);
    //Edad
    Route::Put('update/Personas/{id}/edad/{edad}','PersonasController@actualizarEdad')
    ->where([
        'id'=>'[0-9]+',
        'nombre'=>'[a-zA-Z]+'
    ]);
    //Sexo
    Route::Put('update/Personas/{id}/sexo/{sexo}','PersonasController@actualizarSexo')
    ->where([
        'id'=>'[0-9]+',
        'nombre'=>'[a-zA-Z]+'
    ]);
    /* Eliminar Personas */
    Route::Delete('dropmylife/Personas/{id}','PersonasController@eliminar')
    ->where([
        "id","[0-9]+"
    ]);
/*-----------------------------------------------------------------------------------------------------------*/
/* Publicaciones */
    /* Mostrar publicaciones */
    Route::Get("app/Publicaciones/{id?}",'PublicacionesController@mostrarPublicaciones')->where("id","[0-9]+");
    /* Insertar publicaciones */
    Route::Post("insert/Publicaciones/nueva/{persona_id}/{titulo}/{texto}",'PublicacionesController@insertarPublicaciones')
    ->where([
        'persona_id','[0-9]+',
        "titulo"=>'[a-zA-Z]+',
        "texto"=>'[a-zA-Z]+',
    ]);
    /* Actualizar Publicaciones */
    Route::Put("update/Publicaciones/{id}/{persona_id}/{titulo}/{texto}",'publicacionesController@actualizarPublicaciones')
    ->where([
        'id'=>'[0-9]+',
        'persona_id','[0-9]+',
        "titulo"=>'[a-zA-Z]+',
        "texto"=>'[a-zA-Z]+',
    ]);
    /* Actualizar llave foranea */
    Route::Put("update/Publicaciones/{id}/{persona_id}",'publicacionesController@actualizarForanea')
    ->where([
        'id'=>'[0-9]+',
        'persona_id','[0-9]+',
    ]);
    Route::Put("update/Publicaciones/{id}/titulo/{titulo}",'publicacionesController@actualizarTitulo')
    ->where([
        'id'=>'[0-9]+',
        'titulo','a-zA-Z]+',
    ]);
    Route::Put("update/Publicaciones/{id}/texto/{texto}",'publicacionesController@actualizarTexto')
    ->where([
        'id'=>'[0-9]+',
        'texto','a-zA-Z]+',
    ]);
    /* Eliminar Publicaciones */
    Route::Delete('dropPubli/Publicaciones/{id}','PublicacionesController@eliminarPubli')
    ->where([
        "id","[0-9]+"
    ]);
    /* Comentarios */
    /* Mostrar comentarios */
    Route::Get("app/Comentarios/{id?}",'ComentariosController@mostrarComentarios')->where("id","[0-9]+");
    /* Insertar Comentarios */
    Route::Post("insert/Comentarios/{persona_id}/{publicaciones_id}/{texto}",'ComentariosController@insertarNuevosComentarios')
    ->where([
        "id",'[0-9]',
        "persona_id",'[0-9]',
        "publicaciones_id",'[0-9]',
        "texto",'[a-zA-Z]'
        
    ]);
    /* Modificar comentarios */
    Route::Put("update/Comentarios/todo/{id}/{persona_id}/{publicacion_id}/{texto}",'comentariosController@actualizarComentariosCompletos')
    ->where([
        'id','[0-9]+',
        'persona_id','[0-9]+',
        "publicacion_id"=>'[0-9]+',
        "texto"=>'[a-zA-Z]+',
    ]);
    Route::Put("update/Comentarios/{id}/{persona_id}",'comentariosController@actualizarForaneaComentarios')
    ->where([
        'id'=>'[0-9]+',
        'persona_id','[0-9]+',
    ]);
    Route::Put("update/Comentarios/{id}/{persona_id}/publicacion/{publicacion_id}",'comentariosController@actualizarForaneaComentariosPublicacion')
    ->where([
        'id'=>'[0-9]+',
        'persona_id','[0-9]+',
        'publicacion_id','[0-9]+',
    ]);
    Route::Put("update/Comentarios/texto/{id}/{texto}",'comentariosController@actualizarTextoComentarios')
    ->where([
        'id'=>'[0-9]+',
        'texto','[a-zA-Z]+',
    ]);
    /* Eliminaciones */
    Route::Delete('dropComents/Comentarios/{id}','ComentariosController@eliminarComentarios')
    ->where([
        "id","[0-9]+"
    ]);
    /* Consultas */
    /* Mostrar toda la Base de datos */
    Route::Get('/mostrar/bd','PublicacionesController@mostrarBasedeDatos');
    /* Publicaciones de una persona */
    Route::get('/buscar/publicacion/persona/{persona}/publicacion/{publicacion?}','PublicacionesController@publicacionPersona')->where(
        [
            'persona' => '[0-9]+',
            'publicacion' =>'[0-9]+'
        ]
    );
    /**Comentarios de una persona*/
    Route::get('/mostrar/comentarios/persona/{persona}/{comentario?}','ComentariosController@mostrarComentariosPersonas')->where(
        [
            'persona','[0-9]+',
            'comentario','[0-9]+'
        ]
    );
    /**mostrarComentarioPublicacionPersona */
    Route::get('/mostrarComentarioPublicacionPersona/persona/{persona}/publicacion/{publicacion?}/comentario/{comentario?}','ComentariosController@mostrarComentarioPublicacionPersona')->where(
        [
            'persona','[0-9]+',
            'publicacion','[0-9]+',
            'comentario','[0-9]+'
        ]
    );
    