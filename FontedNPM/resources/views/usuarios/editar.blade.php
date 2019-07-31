

@extends('plantilla')

@section('titulo', 'Usuario')

@section('contenido')
  <h3>Editar usuarios</h3>
  
        @if (session()->has('info'))
       <div class="alert alert-success">{{ session('info') }}</div>
  @endif




    <form method="post" action={{ route('usuarios.update', $usuario->id) }}>
        @csrf
        {!! method_field('PUT') !!}

        {{-- aquí van los input de edición necesarios --}}

        <button>Enviar</button>
    </form> 

@endsection
