@extends('plantilla')

@section('titulo')
   Login
@endsection

@section('contenido')
   <h1>Página de inicio</h1>
   <form method="POST" action="login">
       @csrf
       <input type="email" name="email" placeholder="Correo">
       <input type="password" name="password" placeholder="Contraseña">
       <input type="submit" value="Ingresar">
   </form>


	<td>
        <div class="btn-group" role="group">
            <div class="col-md-6 custom">
                <a class="btn btn-info btn-sm" 
                             href="{{ route('usuarios.edit', $usuario->id) }}">  
                             Editar
                          </a>    
            </div>



            <div class="col-md-6 custom">
                <form method="POST" action=
                                "{{ route('usuarios.destroy', $usuario->id) }}">
                    @csrf
                    {!! method_field('DELETE') !!}
                    <button type="submit" 
                                         class="btn btn-sm btn-danger">
                                         Eliminar
                                 </button>
                </form>
            </div>
        </div>
    </td>
	 
@endsection