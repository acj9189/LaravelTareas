<?php

namespace App\Http\Controllers;

use App\Events\MensajeRecibido;
use App\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MensajesController extends Controller {

    function __construct() {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $mensajes = Mensaje::all(); // recupera sólo los mensajes
        // Los siguientes son ejemplos de carga adelantada:
        // $mensajes = Mensaje::with('user')->get(); // recupera los mensajes con sus usuarios
        // $mensajes = Mensaje::with(['user', 'nota'])->get(); // recupera los mensajes con sus usuarios y sus notas
        // $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->get(); // recupera los mensajes con sus usuarios sus notas y sus etiquetas
        // $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->paginate(10);

        // $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->latest()->paginate(10);

        // $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->simplePaginate(10);

        $key = "mensajes.pagina." . request('page', 1);

        // $mensajes = Cache::remember($key, 600, function () {
        //     return Mensaje::with([
        //         'user',
        //         'nota',
        //         'etiquetas',
        //     ])->orderBy('created_at', request('orden', 'DESC'))->paginate(10);
        // });

        $mensajes = Cache::store('redis')->tags('mensajes')
                                        ->rememberForever($key, function () {
          … // igual que en la versión anterior
       });


        return view('mensajes.index', compact('mensajes'));
    }

    /**
     * Muestra el formulario contacto.blade.php, para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $mostrarCampos = auth()->guest(); // si es invitado, $mostrarCampos=true
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
            $request->request->add([
                'nombre' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]);
        }

        $mensaje = Mensaje::create($request->all());

        if (auth()->check()) {
            auth()->user()->messages()->save($mensaje);
        }

        event(new MensajeRecibido($mensaje));
        Cache::flush();

        return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // $mensaje = Cache::remember("mensajes.{$id}", 600, function () use ($id) {
        //     return Mensaje::findOrFail($id);
        // });

        $mensaje = Cache::store('redis')->tags('mensajes')
                 ->rememberForever("mensajes.{$id}", function () use ($id) {
           return Mensaje::findOrFail($id);
       });


        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // $mensaje = Cache::remember("mensajes.{$id}", 600, function () use ($id) {
        //     return Mensaje::findOrFail($id);
        // });

         $mensaje = Cache::store('redis')->tags('mensajes')
                 ->rememberForever("mensajes.{$id}", function () use ($id) {
           return Mensaje::findOrFail($id);
       });


        $mostrarCampos = !$mensaje->user_id; // true si el mensaje no tiene user_id
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
        Cache::flush();
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
        Cache::flush();
        return redirect()->route('mensajes.index');
    }
}