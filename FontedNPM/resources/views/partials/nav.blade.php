<nav>
   <li class="{{ seleccionado('inicio') }}">
       <a href="{{ route('inicio') }}">Inicio</a>
   </li>
   <li class="{{ seleccionado('acercade') }}">
       <a href="{{ route('acercade') }}">Acerca de...</a>
   </li>
   <li class="{{ seleccionado('catalogo') }}">
       <a href="{{ route('catalogo') }}">Catálogo</a>
   </li>
   <li class="{{ seleccionado('mensajes.create') }}">
       <a href="{{ route('mensajes.create') }}">Contacto</a>
   </li>
  
   <!-- si existe un usuario autenticado actualmente -->
   @if (auth()->check())
       <li class="{{ seleccionado('mensajes.index') }}">
           <a href="{{ route('mensajes.index') }}">Mensajes</a>
       </li>
       <li class="{{ seleccionado('/logout') }}">
           <a href="{{ route('logout') }}">
              Cerrar sesion de {{ auth()->user()->name }} 
           </a>
       </li>
   @endif

  
   <!-- sólo si es un usuario invitado -->
   @if (auth()->guest())
       <li class="{{ seleccionado('login') }}">
           <a href="{{ route('login') }}">Autenticarse</a>
       </li>
   @endif
</nav>