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
   <br>
@endsection