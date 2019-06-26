 <nav>
       <ul>
         <li class="{{ seleccionado('inicio') }}">
              <a href="/">Inicio</a></li>
         <li class="{{ seleccionado('acercade') }}">
              <a href="acercade">Acerca de...</a></li>
         <li class="{{ seleccionado('catalogo') }}">
              <a href="catalogo">Catálogo</a></li>
         <li class="{{ seleccionado('contacto') }}">
              <a href="contacto">Contacto</a></li>
         <li class="{{ seleccionado('crear-mensaje') }}">
              <a href="{{ route('crear-mensaje') }}">ContactoRest</a></li>
           
       </ul>
   </nav>