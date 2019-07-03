@extends('plantilla')

@section('titulo')
    Catálogo
@endsection

@section('contenido')
   <h1>Catálogo de productos</h1>
   <ul>
        @isset ($productos)
           @forelse($productos as $producto)
          <li>
           <a href="{{ route('productos.show', $producto) }}">
                    {{ $producto->nombre }}
           </a>
         </li>

      @empty
          <li>No hay productos para mostrar</li>
      @endforelse
          {{ $productos->links() }}
       @else
          <li>Productos no definido</li>
       @endisset

   </ul>
@endsection