@extends('plantilla')

@section('titulo')
    Catálogo
@endsection

@section('contenido')
   <h1>Catálogo de productos</h1>
   <ul>
        @isset ($productos)
          @forelse($productos as $itemproductos)
              <li>
                  {{ $itemproductos->id }}-{{ $itemproductos->nombre }} <br>
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