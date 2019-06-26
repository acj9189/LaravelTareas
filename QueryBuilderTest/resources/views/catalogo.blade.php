@extends('plantilla')

@section('titulo')
    Catálogo
@endsection

@section('contenido')
   <h1>Catálogo de productos</h1>
   <ul>
       <?php
           foreach ($catalogo as $itemCatalogo) {
               echo "<li>" . $itemCatalogo['producto'] . "</li>";
           }
       ?>
   </ul>
@endsection