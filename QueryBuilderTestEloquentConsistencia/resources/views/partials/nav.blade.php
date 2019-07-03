<nav>
   <li class="{{ seleccionado('inicio') }}">
       <a href="{{ route('inicio') }}">Inicio</a>
   </li>
   <li class="{{ seleccionado('acercade') }}">
       <a href="{{ route('acercade') }}">Acerca de...</a>
   </li>
   <li class="{{ seleccionado('productos.*') }}">
       <a href="{{ route('productos.index') }}">Productos</a>
   </li>
   <li class="{{ seleccionado('contacto') }}">
       <a href="{{ route('contacto') }}">Contacto</a>
   </li>
</nav>