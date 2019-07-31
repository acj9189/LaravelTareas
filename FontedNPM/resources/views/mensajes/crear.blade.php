@extends('plantilla')

@section('titulo', 'Contacto')
	CerarRest...

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

      @if (auth()->guest())
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="input" class="form-control" id="nombre" 
                       name="nombre" placeholder="Ingrese aquí su nombre">
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Ingrese aquí su correo">
            </div>
        @endif
@endsection