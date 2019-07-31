<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Menú</a>

    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="{{ seleccionado('inicio') }}">
                <a class="nav-link" href="{{ route('inicio') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="{{ seleccionado('catalogo') }}">
                <a class="nav-link" href="{{ route('catalogo') }}">Productos</a>
            </li>

            <li class="{{ seleccionado('mensajes.create') }}">
                <a class="nav-link" href="{{ route('mensajes.create') }}">Contacto</a>
            </li>

            <li class="{{ seleccionado('acercade') }}">
                <a class="nav-link" href="{{ route('acercade') }}">Acerca de...</a>
            </li>

        </ul>

        <ul class="navbar-nav navbar-right">
            <!-- si existe un usuario autenticado actualmente -->

              @if (auth()->guest())
               <li class="{{ seleccionado('login') }}">
                   <a class="nav-link" href="{{ route('login') }}">Autenticarse</a>
               </li>
            @else
               <li class="dropdown">
                   <a class="nav-link dropdown-toggle" 
                      href="{{ route('mensajes.index') }}" data-toggle="dropdown">
                       {{ auth()->user()->name }}
                   </a>

                   <ul class="dropdown-menu dropdown-menu-right">
                       <li class="nav-item">
                           <li><a class="dropdown-item" 
                                 href="{{ route('logout') }}">Cerrar sesión
                           </a><li>
                       </li>
                   </ul>
               </li>
           @endif


           
        </ul>
    </div>
</nav>