<?php

// DB::listen(function ($query) {
//     echo "<pre>{ [$query->time] - $query->sql }</pre>";
// });

Route::view('/', 'inicio', ['nombre' => 'Andres Cardenas'])->name('inicio');
Route::view('acercade', 'acercade')->name('acercade');
Route::get('catalogo', 'CatalogoController@index')->name('catalogo');

Route::resource('mensajes', 'MensajesController'); // proporciona rutas RESTful
Route::resource('usuarios', 'UsuariosController'); // proporciona rutas RESTful

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('roles', function () {
    return \App\Role::all();
});

Route::get('roles-usuarios', function () {
    return \App\Role::with('user')->get();
});
