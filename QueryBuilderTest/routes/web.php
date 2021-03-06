<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

$catalogo = [
   ['producto' => 'Harina de trigo'],
   ['producto' => 'Arroz parvorizado'],
   ['producto' => 'Chocolate en polvo'],
   ['producto' => 'Café liofilizado'],
   ['producto' => 'Queso campesino']
];

Route::view('/', 'inicio', ['nombre' => 'Andres'])->name('inicio');
Route::view('/acercade', 'acercade')->name('acercade');
Route::view('/catalogo', 'catalogo', compact('catalogo'))->name('catalogo');
Route::view('/contacto', 'contacto')->name('contacto');

Route::get('mensajes/crear', 'MensajesController@create')->name('crear-mensaje');
Route::post('mensajes', 'MensajesController@store')->name('guardar-mensaje');
Route::get('mensajes', 'MensajesController@index')->name('ver-mensajes');
Route::get('mensajes/{id}', 'MensajesController@show')->name('buscar-mensaje');
Route::get('mensajes/{id}/editar', 'MensajesController@edit')->name('editar-mensaje');
Route::delete('mensajes/{id}', 'MensajesController@destroy')->name('eliminar-mensaje');