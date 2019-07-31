<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller {

    function __construct() {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index() {
      $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->get();
       return view('mensajes.index', compact('mensajes'));
   }


    /**
     * Muestra el formulario contacto.blade.php, para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $mostrarCampos = auth()->guest(); // si es invitado, $mostrarCampos=true /////////////////////////
        return view('mensajes.crear', compact('mostrarCampos', 'mostrarCampos'));
    }

    /**
     * Almacenar un recurso recién creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // dd($request->all()); // verificar lo que llega

        if (auth()->check()) {
            $datosUsuario = auth()->user()->getAttributes();
            $request->request->add([
                'nombre' => $datosUsuario['name'],
                'email' => $datosUsuario['email'],
            ]);
        }

        $mensaje = Mensaje::create($request->all());

        if (auth()->check()) {
            auth()->user()->messages()->save($mensaje);
        }

        return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $mensaje = Mensaje::findOrFail($id);
        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $mensaje = Mensaje::findOrFail($id);
        $mostrarCampos = !$mensaje->user_id;  // true si el mensaje no tiene user_id ///////////////////
        return view('mensajes.editar', compact('mensaje', 'mostrarCampos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Mensaje::findOrFail($id)->update($request->all());
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Mensaje::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}