<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class MensajesController extends Controller
{

    public function __construct() {
       $this->middleware('auth', ['except' => ['create', 'store']]);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = DB::table('mensajes')->get();
       	return view('mensajes.index', compact('mensajes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensajes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('mensajes')->insert([
           'nombre' => $request->input('nombre'),
           'email' => $request->input('correo'),
           'asunto' => $request->input('asunto'),
           'contenido' => $request->input('contenido'),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
       ]);
       // redireccionar. Más adelante se le pedirá que cambie esto
       return redirect()->route('ver-mensajes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
       $mensaje = DB::table('mensajes')->where('id', $id)->first();
       return view('mensajes.show', compact('mensaje'));
   }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensaje = DB::table('mensajes')->where('id', $id)->first();
        return view('mensajes.editar', compact('mensaje'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('mensajes')->where('id', $id)->update([
           'nombre' => $request->input('nombre'),
           'email' => $request->input('correo'),
           'asunto' => $request->input('asunto'),
           'mensaje' => $request->input('contenido'),
           'updated_at' => Carbon::now()
       ]);
       return redirect()->route('ver-mensajes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mensajes')->where('id', $id)->delete();
        return redirect()->route('ver-mensajes');

    }
}
