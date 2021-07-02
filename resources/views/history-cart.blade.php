@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Historial de Compras - Petcicla">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="petcicla.cl">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Historial de Compras - Petcicla">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Historial de Compras - Petcicla">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')
<style>
    .width-moroso{
        width: 100%;
    }
     @media (min-width:767px) {
        .width-moroso{
            width: 30%;}
        .padding-bottom {
            padding-top: 100px !important;
            padding-bottom: 0px !important}
        .padding-top {
            padding-bottom: 100px !important;
            padding-top: 0px !important}
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main-all" class="site-main" >
				<article class="post-97 page type-page status-publish ast-article-single padding-bottom" >
		            <header class="entry-header ast-no-thumbnail ast-no-meta">
                        <h1 class="entry-title" itemprop="headline">Historial de compras</h1>	
                    </header>
	                <div class="entry-content clear" itemprop="text">    
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-cart-form"  id="form_pay_wapay">
                                {{csrf_field()}} 
                                <input type="hidden" name="token_ws" value="" id="token_ws">
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Ticket</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-subtotal">Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach ($compras  as $item)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-price" data-title="Numero">
                                                    <span class="woocommerce-Price-amount amount">{{$item->ticket}}</span>						
                                                </td>
                                                <td class="product-subtotal" data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$ {{$item->total}}</bdi></span>						
                                                </td>
                                                <td class="product-subtotal" data-title="Estado">
                                                    <span class="woocommerce-Price-amount amount">
                                                        @if($item->estado == 0)
                                                            Pendiente
                                                        @else
                                                            Pagado
                                                        @endif
                                                    </span>						
                                                </td>
                                                @if($item->estado == 0)
                                                    <td class="product-price width-moroso" data-title=""  >
                                                        <a onclick="modalHistory({{$item->ticket}},{{$item}})" style="cursor:pointer"  data-original-title="ver" class="ver btn btn-success btn-sm {{$item->ticket}}">Ver Detalles</a>
                                                        			
                                                        
                                                        <div class="wc-proceed-to-checkout" style="width: min-content;display: inline-block;padding:0px">
                                                            {{-- <form action="" id="form_pay_wapay{{$item->ticket}}"> --}}
                                                                
                                                                <div class="lds-ellipsis" id="load{{$item->ticket}}"><div></div><div></div><div></div><div></div></div>
                                                                <button type="button" style="padding: 10px 15px;margin-left:20px;width:90px;" class="checkout-button button alt wc-forward  {{$item->ticket}} pagar" id="finish-pay{{$item->ticket}}" onclick="pagarCart({{$item->ticket}})">Pagar</button>	
                                                                <button type="submit" style="padding: 10px 15px;margin-left:20px;width:150px;" class="checkout-button button alt wc-forward  f" id="finish-pay-fini{{$item->ticket}}" >Finalizar</button>	
                                                            
                                                            {{-- </form> --}}
                                                        </div>

                                                    </td>
                                                @else
                                                    <td class="product-price width-moroso" data-title="" >
                                                        <a onclick="modalHistory({{$item->ticket}},{{$item}})" style="cursor:pointer"  data-original-title="ver" class="ver btn btn-success btn-sm ">Ver Detalles</a>				
                                                    </td>
                                                @endif
                                               
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </form>
                        </div>        
                    </div>        
                </article>
				<article class="post-97 page type-page status-publish ast-article-single padding-top" >
		            <header class="entry-header ast-no-thumbnail ast-no-meta">
                        <h1 class="entry-title" itemprop="headline">Mis Suscripciones</h1>	
                    </header>
	                <div class="entry-content clear" itemprop="text">    
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-cart-form"  >
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th >Numero</th>
                                            <th class="product-price">Dia de Visita</th>
                                            <th class="product-quantity">Semana de Visita</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach ($suscripciones as $item)
                                            
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            
                                            <td  data-title="Numero">
                                                {{$item->nro_suscripcion}}
                                            </td>

                                            <td class="product-name" data-title="Dia de Visita">
                                                {{$item->dia_visita}}
                                            </td>


                                            <td class="product-price" data-title="Semana de Visita">
                                                {{$item->semana_visita}}
                                            </td>

                                            <td class="product-subtotal" data-title="" >
                                                <a  onclick="modalSuscripcion({{$item}})" style="cursor:pointer"  data-original-title="ver-suscripcion" class="ver-suscripcion btn btn-success btn-sm">Ver Detalles</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </form>
                        </div>        
                    </div>        
                </article>
            </main>
        </div>
    </div>

   
      

@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
{{--<script src="{{asset('js/publico/publico-historico.js')}}"></script>--}}
<script>
    $(document).ready(function() {
        $(`.lds-ellipsis`).hide()
        $(`.f`).hide()
    });
</script>

<script>
    let authentication = false
    function pagarCart(ticket) {
        $(`.${ticket}`).hide()
        $(`#load${ticket}`).show()
        $(`.pagar`).hide()


        $.ajax({
            type: "get",
            url: "/payment-history",
            data:{
                "_token": "{{ csrf_token() }}",
                "ticket": ticket,
            },
            success: function (data) {
                console.log(data)
                $(`#token_ws`).val(data.response.token);
                $(`#form_pay_wapay`).attr("action", data.response.url);
                $(`#finish-pay-fini${ticket}`).show()
                $(`#load${ticket}`).hide()

               
                // localStorage.clear("total_price_product")

            },
            error: function (data) {
                modalCloseHistory()
                $('#finish-pay').hide()
                $('#load').hide()
                $('#confirm-pay').show()
                Swal.fire({
                    title: "Error!",
                    text: data.statusText,
                    type: "error",
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });

        console.log(ticket)
    }
    

    function modalHistory(params,obj) {
        
        $.ajax({
            type: "GET",
            url: `api/sendInfoTicket/${params}`,
            success: function (data) {
                console.log(data.info)
                $.ajax({
                    type: "get",
                    url: "/auth/check",
                    success: function (usr) {

                        authentication = (usr === '1') ? true : false
                        if(authentication === true){
                            $(`#desp-${obj.id}`).text(0)
                        }else{
                            data.info.forEach(element => {
                                if(element.precio_envio === 0){
                                    $(`#desp-${obj.id}`).text(0)
                                    return 0
                                }else{
                                    if(data.precio_despacho > obj.total){
                                        $(`#desp-${obj.id}`).text(0)
                                    }else{
                                        $(`#desp-${obj.id}`).text(formatCurrency(data.precio_despacho))
                                    }
                                }
                            });
                        }



                    }
                });

                

                

                let tbody_lista_ventas = ``
                let html = ``
                if(window.screen.width >= 767 ){
                    html += `<div class="ast-content-main-wrapper">
                                    <div class="ast-content-main">
                                        <div class="ast-lightbox-content">
                                            <div class="ast-content-main-head">
                                                <a onclick="modalCloseHistory()" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                            </div>
                                            <div id="ast-quick-view-content" class="woocommerce single-product" style="max-width: 982px; max-height: 673px;min-width:500px;min-height:300px">
                                                <div class="ast-woo-product">
                                                    <div id="product-245" class="product post-245 type-product status-publish has-post-thumbnail product_cat-alimentos-para-mascotas ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image first instock featured shipping-taxable purchasable product-type-simple">
                                                        <div class="summary entry-summary" style="width:100%">
                                                            <div class="summary-content">`;
                }

                
                                                            html += `<article class="post-97 page type-page status-publish ast-article-single"`; if(window.screen.width >= 767 ){ html += `style="padding:0px !important"` } html += `>`;
                                                                if(window.screen.width <= 767 ){ 
                                                                    html += `<div class="ast-content-main-head">
                                                <a onclick="modalCloseHistory()" style="right: 15px;top: 22px;" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                            </div>` 
                                                                }
                                                                html += `<header class="entry-header ast-no-thumbnail ast-no-meta">
                                                                    <h1 class="entry-title" itemprop="headline"> #${params}</h1>	
                                                                </header>
                                                                <div class="entry-content clear" itemprop="text">    
                                                                    <div class="woocommerce">
                                                                        <div class="woocommerce-notices-wrapper"></div>
                                                                        <form class="woocommerce-cart-form"  >
                                                                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Producto</th>
                                                                                        <th scope="col">Cantidad</th>
                                                                                        <th scope="col">Precio Unidad</th>
                                                                                        <th scope="col">Subtotal</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="lista-ventas"></tbody>
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align:right" colspan="4" scope="col">Despacho</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td style="text-align:right" colspan="4" data-title="Despacho" >$ <span id="desp-${obj.id}" ></span></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align:right" colspan="4" scope="col">Total</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td style="text-align:right" colspan="4" data-title="Total" >$ ${ formatCurrency(obj.total) } </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>        
                                                                </div>        
                                                            </article>`;
                if(window.screen.width >= 767 ){
                    html += `                           </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                }

                data.info.forEach( (element, index) => {
                    tbody_lista_ventas += `<tr class="woocommerce-cart-form__cart-item cart_item">
                        <td data-title="Producto" > ${element.titulo} </td>
                        <td data-title="Cantidad" > ${element.cantidad}  </td>
                        <td data-title="Precio Unidad" >$ ${ formatCurrency(element.sub_total / element.cantidad)} </td>
                        <td data-title="Subtotal" >$ ${ formatCurrency(element.sub_total)} </td>
                    </tr>`;
                });
                $('#ast-quick-view-modal').empty().append(html)
                $('#lista-ventas').empty().append(tbody_lista_ventas)
                if(window.screen.width <= 767 ){
                    $('.ast-quick-view-loader').removeClass('ast-quick-view-loader')
                }
                
                

                $('.ast-quick-view-bg').addClass('ast-quick-view-bg-ready')
                $('#ast-quick-view-modal').addClass('open stick-add-to-cart')
            },
            error: function (data) {
                Swal.fire({
                    title: "Error!",
                    text: data.statusText,
                    type: "error",
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });
    }
    function modalSuscripcion(params) {
        let box = 0
        if(params.id === 1){
            box = params.tiempo * 2
        }
        if(params.id === 2){
            box = params.tiempo
        }
        let box_each = (box/6 < 1) ? 1 : box/6
        let box_arr = []


        let index_box = 1

        for (let index = 1; index <= box_each; index++) {
            let data = []
            for (let index2 = 1; index2 <= box; index2++) {
                if(data.length < 6){
                    data.push({title:`Visita ${index_box}`,fecha: (params[`fecha_${index_box}`] ) ? params[`fecha_${index_box}`] : 'No Definido' })
                    index_box = index_box + 1
                }
                
            }
            box_arr.push(data) 
            
        }
        let title = params.nombre_paquete.charAt(0).toUpperCase() + params.nombre_paquete.slice(1)
        $.ajax({
            type: "GET",
            url: `api/sendInfoSuscripcion/${params.nro_suscripcion}`,
            success: function (data) {
                console.log(data)
                let html = ``
                let tbody_lista_suscripcion_kits = ``
                if(window.screen.width >= 767 ){
                    html += `<div class="ast-content-main-wrapper">
                                    <div class="ast-content-main">
                                        <div class="ast-lightbox-content">
                                            <div class="ast-content-main-head">
                                                <a onclick="modalCloseHistory()" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                            </div>
                                            <div id="ast-quick-view-content" class="woocommerce single-product" style="max-width: 982px; max-height: 673px;min-width:500px;min-height:300px">
                                                <div class="ast-woo-product">
                                                    <div id="product-245" class="product post-245 type-product status-publish has-post-thumbnail product_cat-alimentos-para-mascotas ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image first instock featured shipping-taxable purchasable product-type-simple">
                                                        <div class="summary entry-summary" style="width:100%">
                                                            <div class="summary-content">`;
                }

                
                html += `<article class="post-97 page type-page status-publish ast-article-single"`; if(window.screen.width >= 767 ){ html += `style="padding:0px !important"` } html += `>`;
                                                                if(window.screen.width <= 767 ){ 
                                                                    html += `<div class="ast-content-main-head">
                                                <a onclick="modalCloseHistory()" style="right: 15px;top: 22px;" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                            </div>` 
                                                                }
                                                                html += `<header class="entry-header ast-no-thumbnail ast-no-meta">
                                                                    <h1 class="entry-title" itemprop="headline">Suscripcion</h1>	
                                                                </header>
                                                                <div class="entry-content clear" itemprop="text">    
                                                                    <div class="woocommerce">
                                                                        <div class="woocommerce-notices-wrapper"></div>
                                                                        <form class="woocommerce-cart-form"  >
                                                                            <table class=" woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th colspan="4" style="border-bottom: none;text-align: center" style="text-align: center" class="product-thumbnail">${title}, tiempo de duracion: ${params.tiempo} meses </th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                            <table style="margin-bottom:0px" class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Paquete</th>
                                                                                        <th scope="col">Comuna</th>
                                                                                        <th scope="col">Calle</th>
                                                                                        <th scope="col">Numero</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="lista-suscripcion">
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td data-title="Paquete" > ${params.nombre_paquete} </td>
                                                                                        <td data-title="Comuna" > ${params.comuna} </td>
                                                                                        <td data-title="Calle" > ${params.calle_avenida} </td>
                                                                                        <td data-title="Numero" > ${params.numero} </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table class=" woocommerce-cart-form__contents"  cellspacing="0">
                                                                                <thead>`;
                                                                                    box_arr.forEach(element => {
                                                                                       html +=`<tr>`;
                                                                                            element.forEach(element2 => {
                                                                                                html += `<th  style="text-align: center;font-size:12px" class="product-thumbnail"> ${element2.title} <br />  ${element2.fecha} </th>`;
                                                                                            });
                                                                                        html += `</tr>`; 
                                                                                    });
                                                                                    html += `</thead>
                                                                            </table>
                                                                        </form>
                                                                    </div>        
                                                                </div>        
                                                            </article>
                                                            <article class="post-97 page type-page status-publish ast-article-single" style="padding:0px !important" >
                                                                <header class="entry-header ast-no-thumbnail ast-no-meta">
                                                                    <h1 class="entry-title" itemprop="headline">Kits</h1>	
                                                                </header>
                                                                <div class="entry-content clear" itemprop="text">    
                                                                    <div class="woocommerce">
                                                                        <div class="woocommerce-notices-wrapper"></div>
                                                                        <form class="woocommerce-cart-form"  >
                                                                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Nombre</th>
                                                                                        <th scope="col">Precio</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="lista-suscripcion-kits"></tbody>
                                                                            </table>
                                                                        </form>
                                                                    </div>        
                                                                </div>        
                                                            </article>`;
                if(window.screen.width >= 767 ){
                    html += `                           </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                }
                if(data.name_kits){
                    data.name_kits.forEach( (element, index) => {
                        tbody_lista_suscripcion_kits += `<tr class="woocommerce-cart-form__cart-item cart_item">
                            <td data-title="Nombre" > ${element.nombre_kit} </td>
                            <td data-title="Precio" > ${element.precio} </td>
                        </tr>`;
                    });
                }
                
                $('#ast-quick-view-modal').empty().append(html)
                $('#lista-suscripcion-kits').empty().append(tbody_lista_suscripcion_kits)
                
                if(window.screen.width <= 767 ){
                    $('.ast-quick-view-loader').removeClass('ast-quick-view-loader')
                }

                $('.ast-quick-view-bg').addClass('ast-quick-view-bg-ready')
                $('#ast-quick-view-modal').addClass('open stick-add-to-cart')
                
            },
            error: function (data) {
                Swal.fire({
                    title: "Error!",
                    text: data.statusText,
                    type: "error",
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });
    }
    
    function modalCloseHistory() {
        $('.ast-quick-view-bg').removeClass('ast-quick-view-bg-ready')
        $('#ast-quick-view-modal').removeClass('open stick-add-to-cart')
    }
</script>
@endsection
