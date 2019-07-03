@extends('plantilla')
@section('titulo', 'Mensaje')
@section('contenido')
    <h1>Mensajes</h1>
 		@foreach ($mensajes as $mensaje)
            <tr>
                <td>
                    <a href="{{ route('buscar-mensaje', $mensaje->id) }}">
                        {{ $mensaje->nombre}}
                    </a>
                </td>
                <td>{{ $mensaje->email}}</td>
                <td>{{ $mensaje->asunto}}</td>
                <td>{{ $mensaje->contenido}}</td>
            </tr>
        @endforeach


@endsection