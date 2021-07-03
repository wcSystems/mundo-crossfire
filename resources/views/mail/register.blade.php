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
        <img src="{{ url('images/cropped-Petcicla-1-155x52-2.png')}}" alt="" width="300"> 
    </div>
    <div>
        <h2 class="text-center"> Hola , {{$user->name}}</h2>
        <p class="text-center">Tu usuario ha sido creado satisfactoriamente, Gracias por registrarte en <a href="https://mundo-crossfire.com.ve/">mundo-crossfire.com.ve</a> </p>
    </div>
</body>
</html>