<?php

namespace App\Http\Controllers;

class CatalogoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $catalogo = \DB::table('productos')->get();
        return view('catalogo', compact('catalogo'));
    }

}
