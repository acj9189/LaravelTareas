

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest; ////////// se importó
use App\User;
use Illuminate\Http\Request;
////////// se importó

class UsuariosController extends Controller {

    function __construct() { ///////////////////////////
        $this->middleware('auth');
        // la siguiente excepción hace que edit de usuarios pueda ser accesible para cualquier ID desde la barra de direcciones
        $this->middleware('roles:Administrador', ['except' => ['edit']]);
    }

    /**
     * Desplegar una lista del recurso (una lista de usuarios).
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = \App\User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Mostrar el formulario para editar un recurso (usuario) específico
     *
     * @param  int  $id El id del usuario a editar
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $usuario = User::findOrFail($id); /////////////////////se importó la clase para poder usar
        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Actualizar el recurso especificado en la tabla "user"
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id El id del usuario a actualizar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id) { ///////////UpdateUserRequest////////////////////////////////
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());
        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
