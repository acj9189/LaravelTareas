<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensajes de contactos</title>
    </head>
    <body>
       <h3>Hay un nuevo mensaje por revisar:</h3>
       <p>Cuenta: {{ $msg['nombre'] }} - {{ $msg['email'] }}</p>
       <p><strong>Asunto:</strong> {{ $msg['asunto'] }} </p>
       <p><strong>Contenido:</strong> {{ $msg['contenido'] }} </p>
       <hr>
       Gracias por verificar su contenido.
    </body>
</html>