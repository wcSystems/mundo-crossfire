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
        <img src="{{ url('images/logo.png')}}" alt="" width="300"> 
    </div>
   
    <div>
        <h2 class="text-center"> Gracias por tu compra @if(Auth::check()) {{$user->name}} @else {{$user->names}} @endif, aquí esta tu detalle de transacción, te contactaremos lo antes posible.</h2>
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
</body>
</html>