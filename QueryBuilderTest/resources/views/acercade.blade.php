@extends('plantilla')

@section('titulo')
    Acerca de MI::
@endsection

@section('contenido')
   <h1>Página de inicio</h1>
   Bienvenid@ {{ $nombre ?? 'Invitado' }}
@endsection