<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>
        <center>Comentarios sobre películas</center>
    </h2>
    Enviado por: {{ $nombre }}<br>
    Email del usuario: {{ $email }}<br>
    Contenido del comentario:
    <p>{{ $contenido }}</p>
</body>

</html>
