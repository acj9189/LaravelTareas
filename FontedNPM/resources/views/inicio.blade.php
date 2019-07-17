@extends('plantilla')

@section('titulo')
    Proyecto REST...
@endsection

@section('contenido')
   <h1>Página de inicio</h1>
   Bienvenid@ {{ $nombre ?? 'Invitado' }}
@endsection