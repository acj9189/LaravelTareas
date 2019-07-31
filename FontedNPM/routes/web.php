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

App::setLocale('es');

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
//Route::view('/catalogo', 'catalogo', compact('catalogo'))->name('catalogo');
Route::view('/contacto', 'contacto')->name('contacto');

Route::get('mensajes/crear', 'MensajeController@create')->name('crear-mensaje'); //Error Mensajes por mensaje
Route::post('mensajes', 'MensajeController@store')->name('guardar-mensaje');
Route::get('mensajes', 'MensajeController@index')->name('ver-mensajes');
Route::get('mensajes/{id}', 'MensajeController@show')->name('buscar-mensaje');
Route::get('mensajes/{id}/editar', 'MensajeController@edit')->name('editar-mensaje');
Route::delete('mensajes/{id}', 'MensajeController@destroy')->name('eliminar-mensaje'); // Error Mensajes por mensaje

Route::get('/catalogo','ProductoController@index')->name('productos.index');
Route::get('/catalogo/{producto}','ProductoController@show')->name('productos.show');

Route::get('/catalogo/crear','ProductoController@create')->name('productos.create');
Route::post('/catalogo/','ProductoController@store')->name('productos.store');


Route::view('/', 'inicio', ['nombre' => 'NN'])->name('inicio');
Route::view('acercade', 'acercade')->name('acercade');
Route::get('catalogo', 'CatalogoController@index')->name('catalogo');

Route::resource('mensajes', 'MensajeController');

Route::resource('usuarios', 'UsuarioController');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('roles', function () {
   return \App\Role::all();
});

Route::get('roles-usuarios', function () {
   return \App\Role::with('user')->get();
});

Route::resource('usuarios', 'UsuarioController');
