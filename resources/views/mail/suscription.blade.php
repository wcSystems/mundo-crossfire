<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suscripcion</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
    }
    .text-center{
        text-align: center;
    }
</style>
<body>
    <div class="text-center">
        <img src="{{ url('images/logo.png')}}" alt="" width="300"> 
    </div>
    <div>
        <h2 class="text-center"> Hola {{$user->name}}, Te has suscrito en nuestra plataforma.</h2>
        <p class="text-center">Tu Suscripcion ha sido creada satisfactoriamente, Gracias por suscribirte en <a href="https://mundo-crossfire.com.ve.cl/">mundo-crossfire.com.ve</a> </p>
        <p class="text-center"> Nro de Suscripcion : {{$venta->nro_suscripcion}}</p>
    </div>
</body>
</html>