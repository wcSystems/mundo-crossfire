@php
    $ticket = $suscripcion ? $ventas[0]->nro_suscripcion : $ventas[0]->ticket
@endphp

@extends('app')
@section('css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main-all" class="site-main" >
                <article style="text-align:center" class="post-97 page type-page status-publish ast-article-single" >
                    <h1 >Gracias por su compra</h1>
                    <p style="margin: 20px;padding:0;font-size:20px">¡¡Felicidades!! por formar parte del primer delivery con huella positiva, pronto te contactaremos.</p>
                    <p style="margin: 20px">
                        Estado: Completado <br>
                        Ticket - Nro de Compra: {{$ticket}}
                    </p>
                    @auth
                        <a href="{{url('history')}}">
                            Ver historial de compras
                        </a> 
                    @endauth
                   
                </article>
            </main>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('js/publico/publico-historico.js')}}"></script>
<script>
    $(document).ready(function() {
        localStorage.clear();
    });
</script>



@endsection
