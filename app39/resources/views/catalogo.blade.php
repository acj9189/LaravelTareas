@extends('plantilla')

@section('titulo')
    Catálogo
@endsection

@section('contenido')
   <h1>Catálogo de productos</h1>

   <ul>
        @isset ($catalogo)
           @forelse($catalogo as $itemCatalogo)
               <li> {{ $itemCatalogo->id }}-{{ $itemCatalogo->nombre }} </li>
           @empty
               <li>No hay productos para mostrar</li>
           @endforelse
        @else
           <li>Catálogo no definido</li>
        @endisset

   </ul>

   <br>
   <a href="/">Volver a la página inicial</a>

@endsection