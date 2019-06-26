<!DOCTYPE html>
<html lang="es">
<head>
   ...
   <style>
       .activo a {
           color: red;
           text-decoration: none;
       }
   </style>
</head>

<body>
 
   @include('partials/nav')
   @yield('contenido')

</body>
</html>

</html>