
<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

    function __construct() { //
        $this->middleware('auth', ['except' => ['show']]);
        // la siguiente excepción hace que edit de usuarios pueda ser accesible para cualquier ID desde la barra de direcciones
        $this->middleware('roles:Administrador', ['except' => ['edit', 'update', 'show']]); //////////////////////////
    }

    /**
     * Desplegar una lista del recurso (una lista de usuarios).
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
         $usuarios = User::with(['roles', 'nota', 'etiquetas'])->get();
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
    public function store(CreateUserRequest $request) {
       // dd($request->all()); // <-- ver lo que llega
       $user = User::create($request->all()); // guardar usuario
       $user->roles()->attach($request->roles); // guardar roles
       return redirect()->route('usuarios.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { ///////////////////////////////
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Mostrar el formulario para editar un recurso (usuario) específico
     *
     * @param  int  $id El id del usuario a editar
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $usuario = User::findOrFail($id); // se importó la clase para poder usar
        $this->authorize($usuario); //////////////////////
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
    public function update(UpdateUserRequest $request, $id) {
       // dd($request->all()); // <-- ver datos recibidos
       $usuario = User::findOrFail($id);
       $this->authorize($usuario);
       // $request->all() | $request->only | $request->except
       $usuario->update($request->except('password')); 
       $usuario->roles()->sync($request->roles); // attach duplica
       return back()->with('info', 'Usuario actualizado');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::findOrFail($id);
        $this->authorize($user); ///////////////////////////////
        User::delete();
        return back();
    }
}
