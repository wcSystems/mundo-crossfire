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
                    <h1 >Error</h1>
                    <p style="margin: 40px">
                        Estado: Error , su pago no se ha realizado <br>
                        Ticket - Nro de Compra: {{$ticket}}
                    </p>
                    <a href="/history">
                        Volver a mi historial
                    </a>
                </article>
            </main>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('js/publico/publico-historico.js')}}"></script>

@endsection
