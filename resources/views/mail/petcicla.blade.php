<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra - Realiza</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <img src="{{ url('images/cropped-Petcicla-1-155x52-2.png')}}" alt="" width="300"> 
    </div>
@if($type_send == 1)
    <div>
        <h2 class="text-center"> Tiene una nueva compra  de @if(Auth::check()) {{$user->name}} @else {{$user->names}} @endif, aquí esta tu detalle de transacción.</h2>
        <p class="text-center">Nro de ticket : {{$venta[0]->ticket}}</p>
            <table style="width:100%">
                <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Sub Total</th>
                </tr>
                @foreach ($venta as $item)
                    <tr class="text-center">
                        <td class="text-center">{{$item->productos->titulo}}</td>
                        <td class="text-center">{{$item->cantidad}}</td>
                        <td class="text-center"> {{$item->sub_total}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th class="text-center">-</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">{{$venta[0]->total}}</th>
                </tr>
            </table>
    </div>
@endif

@if($type_send == 2)
    <div>
        <h2 class="text-center"> Tienen una nueva Suscripcion de {{$user->name}} </h2>
        <p class="text-center"> Nro de Suscripcion : {{$venta->nro_suscripcion}}</p>
    </div>
@endif

@if($type_send == 3)
    <div>
        <p class="text-center">Tiene un nuevo  usuario registrado su nombre es: {{$user->name}} </p>
    </div>
@endif

</body>
</html>