@extends('plantilla')

@section('titulo', 'Contacto')

@section('contenido')
    <h1>Contacto</h1>
     <form method="post" action="{{ route('guardar-mensaje') }}">
        @csrf
        <input name="nombre" placeholder="Nombre..."><br>
        <input type="email" name="correo" placeholder="Correo..."><br>
        <input name="asunto" placeholder="Asunto..."><br>
        <textarea name="contenido" placeholder="Mensaje..."></textarea><br>
        <button>Enviar</button>
    </form>
@endsection