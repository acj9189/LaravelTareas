

@extends('plantilla')

@section('titulo', 'Mensaje')

@section('contenido')
    <h1>Mensaje</h1>

    <form method="post" action="{{ route('actualizar-mensaje') }}">
        @csrf

        <input name="nombre" placeholder="Nombre..." 
               value="{{ $mensaje->nombre }}"><br>
        {!! $errors->first('nombre', '<small>:message</small>') !!} <br>
        
        <input type="email" name="correo" placeholder="Correo..."   
               value="{{ $mensaje->email }}"><br>
        {!! $errors->first('correo', '<small>:message</small>') !!} <br>
        
        <input name="asunto" placeholder="Asunto..." 
               value="{{ $mensaje->asunto }}"><br>
        {!! $errors->first('asunto', '<small>:message</small>') !!} <br>
        
        <textarea name="contenido" placeholder="Contenido...">
            {{ $mensaje->contenido }}
        </textarea><br>
        {!! $errors->first('contenido', '<small>:message</small>') !!}
        <br>
        <button>Enviar</button>
    </form> 

@endsection
