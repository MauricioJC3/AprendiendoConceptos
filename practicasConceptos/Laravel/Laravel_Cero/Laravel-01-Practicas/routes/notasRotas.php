<?php

use Illuminate\Support\Facades\Route;

/**
 * Tipos de peticiones
 * GET, -> Son peticiones para obtener informacion o traer algo
 * POST, -> Son peticiones para crear informacion y enviar datos al servidor
 * PUT, -> Son peticiones para actualizar informacion
 * PATCH, -> Son peticiones para actualizar parcialmente informacion
 * DELETE -> Son peticiones para eliminar informacion
 */

Route::get('/', function () {
    return 'Hola mundo!';
});

// lo que va dentro de las llaves es una URI '/post', esta es una ruta simple
Route::get('/post', function () {
    return 'post';
});

/* El orden de las rutas es muy importante ya que laravel lee de arriba para abajo,
// si encuentra una ruta que cumpla con la peticion primero que con la que se quiere se aplicara esta,
// y no continuara con la siguiente que se quiere uilizar.
// 
// URIs Dinamica '/post/{post}' cuando la variable sea dinamica tiene que estar entre llaves {} ,
// esta es una ruta con parametro
// pueden haber muchas rutas con muchos parametros
*/

// se ejecutara y aplicara primero que la siguinte ruta porque cumple con una de las dos condiciones
Route::get('/post/{post}', function ($post) {
    return 'post ' . $post; 
});


// la solucion es poner esta ruta y las de este tipo primero que la que recive un parametro
Route::get('/post/create', function () {
    return 'post create';
});


// el sombolo de pregunta en categoria permite que la variable categoria sea opcional
Route::get('/post/{post}/{categoria?}', function ($post, $categoria = 'null') {

    // condicional para verificar si la variable categoria tiene un valor
    if($categoria)
    {
        return 'este post es de : ' . $post . ' de la categoria ' . $categoria; 
    }
    return 'este post es de : ' . $post; 
});

