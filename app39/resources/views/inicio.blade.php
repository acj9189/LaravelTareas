@extends('plantilla')

@section('titulo')
    Tienda Online
@endsection

{{-- cuando el contenido es corto se puede usar:  @section('sección', 'contenido') --}}

@section('contenido')
   <h1>Página de inicio</h1>
   Bienvenid@ {{ $nombre ?? 'Invitado' }}
@endsection