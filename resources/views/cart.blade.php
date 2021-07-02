@php
  use App\Models\Precio_Despacho;
  $envio = Precio_Despacho::find(1)->precio_despacho;
  $monto= Precio_Despacho::find(1)->monto;

@endphp

@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Carrito de Compra - Petcicla">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="petcicla.cl">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Carrito de Compra - Petcicla">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Carrito de Compra - Petcicla">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div class="ast-container">


        <div id="primary" class="content-area primary">


            <main id="main-none" class="site-main">
                <article class="post-97 page type-page status-publish ast-article-single" id="post-97">
                    <header class="entry-header ast-no-thumbnail ast-no-meta">

                        <h1 class="entry-title" itemprop="headline">Carro de Compras</h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content clear" itemprop="text">


                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <p class="cart-empty woocommerce-info">Tu carrito está vacío.</p>
                            <p class="return-to-shop">
                                <a class="button wc-backward" href="{{ route('/') }}">
                                    Volver a la tienda </a>
                            </p>
                        </div>



                    </div><!-- .entry-content .clear -->



                </article><!-- #post-## -->

            </main>

            <main id="main-all" class="site-main">
				<article class="post-97 page type-page status-publish ast-article-single"  itemscope="itemscope">
		<header class="entry-header ast-no-thumbnail ast-no-meta">
		
		<h1 class="entry-title" itemprop="headline">Carro de Compras</h1>	</header><!-- .entry-header -->

	<div class="entry-content clear" itemprop="text">

		
		<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
<form class="woocommerce-cart-form"  >
	
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name">Producto</th>
				<th class="product-price">Precio</th>
				<th class="product-quantity">Cantidad</th>
				<th class="product-subtotal">Subtotal</th>
			</tr>
		</thead>
		<tbody id="tbodycartproductview"></tbody>
	</table>
    <table class=" woocommerce-cart-form__contents"  cellspacing="0">
        <thead>
            <tr>
                <th colspan="4" style="text-align: center;font-weight: normal !important" class="product-thumbnail"> Obtendrás tus productos en menos de 48 horas</th>
            </tr>
        </thead>
    </table>
	</form>


<div class="cart-collaterals">
	<div class="cart_totals ">

	
	<h2>Total del carrito</h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">
        <tbody id="despachohtmluser">

          
            <tr >
                <th>Subtotal</th>
                <td id="Subtotal" data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>0</bdi></span></td>
            </tr>

            
            <tr >
                <th>Total</th>
                <td id="total" data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>0</bdi></span></strong> </td>
            </tr>

		
	    </tbody>
    </table>
    

	<div class="wc-proceed-to-checkout">
        <form action="" id="form_pay_wapay">
            {{csrf_field()}} 
            <input type="hidden" name="token_ws" value="" id="token_ws">
            <div class="lds-ellipsis" id="load"><div></div><div></div><div></div><div></div></div>

            @auth
                <a class="checkout-button button alt wc-forward" id="confirm-pay" onclick="modalConfirm()">Continuar</a>
            @endauth

            @guest
                <a class="checkout-button button alt wc-forward" id="confirm-pay" href="{{ route('user-new-form') }}">Continuar</a>
            @endguest
            <button type="submit" class="checkout-button button alt wc-forward" id="finish-pay">Pagar 
            </button>



        </form>
	</div>

	
</div>
</div>

</div>

		
		
	</div><!-- .entry-content .clear -->

	
	
</article><!-- #post-## -->

			</main>






        </div><!-- #primary -->


    </div> <!-- ast-container -->
@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#finish-pay').hide()
        $('#load').hide()

    });
</script>

<script>
    let arr_cart_productss = (JSON.parse(localStorage.getItem("arr_cart_products"))) ? JSON.parse(localStorage.getItem("arr_cart_products")) : []
    let despacho = 0
    let total = JSON.parse(localStorage.getItem("total_price_product"))
    
    let authentication = false
    if (arr_cart_productss.length >= 1) {
        $('#main-none').css('display','none')
        $('#main-all').css('display','block')
        addItemCarts()
    
    }else{
        $('#main-all').css('display','none')
        $('#main-none').css('display','block')
    }
    costo_despacho()
    $('#total').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product")) + despacho) )

    function deleteItemCarts(params,unit,price) {


            localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) - unit) )
            localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) - price ))

            $('#total_items').attr('data-cart-total', JSON.parse(localStorage.getItem("unit_product")));
            $('#total_price_items').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) );

            arr_cart_productss.splice(params,1)
            localStorage.setItem("arr_cart_products", JSON.stringify( arr_cart_productss ))

            $('#Subtotal').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) )
            $('#total').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product")) + despacho) )


            
            
        //}
        addItemCarts()

        

    }
    
    function unitProducts(params,index) {
        const units = parseInt($(`#quantity-${index}`).val())
        switch (params) {
            
            case 'plus':
                $(`#quantity-${index}`).val(units + 1)
                localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) + 1) )
                localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) + arr_cart_productss[index].price ))
                break;
        
            case 'minus':
                if(parseInt($(`#quantity-${index}`).val()) <= 1){
                    $(`#quantity-${index}`).val(1)
                }else{
                    $(`#quantity-${index}`).val(units - 1)
                    localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) - 1) )
                    localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) - arr_cart_productss[index].price ))
                }
                break;
        
            default:
                break;
        }
        arr_cart_productss[index].unit = parseInt($(`#quantity-${index}`).val())
        arr_cart_productss[index].total = arr_cart_productss[index].price * parseInt($(`#quantity-${index}`).val())

        
            
        $('#total_items').attr('data-cart-total', JSON.parse(localStorage.getItem("unit_product")));
        $('#total_price_items').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) );

        localStorage.setItem("arr_cart_products", JSON.stringify( arr_cart_productss ))
        addItemCarts()
        addItemCart()

        $('#Subtotal').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) )
        $('#total').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product")) + despacho ) )

        arr_cart_products.forEach( (element, index) => {
            $(`#format-in-html-modal-emergente-${index}`).text(formatCurrency(parseInt($(`#format-in-html-modal-emergente-${index}`).text())))
        });
        
    }


    function addItemCarts() {
        
        $('#Subtotal').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) )
        $('#total').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product")) + despacho) )
        costo_despacho(0)
        let arrCart = ``
        arr_cart_productss.forEach( (element, index) => {
                arrCart += `
                <tr class="woocommerce-cart-form__cart-item cart_item">
                    <td class="product-remove">
                        <a onclick="deleteItemCarts(${index},${element.unit},${element.total})" style="cursor:pointer" class="remove" aria-label="Borrar este artículo" data-product_id="245" data-product_sku="">×</a>						
                    </td>
                    <td class="product-thumbnail">
                        <a ><img width="300" height="300" alt="" src="${element.img}" ></a>						
                    </td>

                    <td class="product-name" data-title="Producto">
                        <a >${element.titulo}</a>						
                    </td>

                    <td class="product-price" data-title="Precio">
                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$ </span>` + formatCurrency( element.price) +`</bdi></span>						
                    </td>

                    <td class="product-quantity" data-title="Cantidad">
                        <div class="quantity buttons_added">
                            <a onclick="unitProducts('minus',${index})" class="minus" style="cursor:pointer">-</a>
                            <label class="screen-reader-text" for="quantity-${index}">${element.titulo}</label>
                            <input type="number" id="quantity-${index}" class="input-text qty text" step="1" min="0" max=""  value="${element.unit}" title="Cantidad" size="4"  inputmode="numeric">
                            <a onclick="unitProducts('plus',${index})" style="cursor:pointer" class="plus">+</a>
                        </div>
                    </td>

                    <td class="product-subtotal" data-title="Subtotal">
                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$ </span>` + formatCurrency(element.total)  + `</bdi></span>						
                    </td>
                </tr>`;
            });

        $('#tbodycartproductview').empty().append(arrCart)
        
    }

    function addItemCart2Header() {
           
           let list = ``;
           let arr_cart_products = (JSON.parse(localStorage.getItem("arr_cart_products"))) ? JSON.parse(localStorage.getItem("arr_cart_products")) : []
           list += `<div class="widget woocommerce widget_shopping_cart">
                       <div class="widget_shopping_cart_content">
                           <ul class="woocommerce-mini-cart cart_list product_list_widget ">`;

                           arr_cart_products.forEach( (element, index) => {
                               list += `
                               <li class="woocommerce-mini-cart-item mini_cart_item">
                                   <a  class="remove remove_from_cart_button" aria-label="Borrar este artículo" style="cursor:pointer" onclick="deleteItemCart(${index},${element.unit},${element.total})" data-product_sku="">×</a>											
                                   <a href="http://localhost/wordpress/producto/assorted-dry-fruits/">
                                   <img width="300" height="300" src="${element.img}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px">${element.titulo}</a>
                                   <span class="quantity">${element.unit} × 
                                       <span class="woocommerce-Price-amount amount"><bdi>
                                       <span class="woocommerce-Price-currencySymbol">$</span><span id="format-in-html-modal-emergente-${index}">${element.price}</span></bdi></span>
                                   </span>				
                               </li>
                               `;
                           });

                       
           list +=     `</ul>
                       <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount">
                           <bdi><span class="woocommerce-Price-currencySymbol">$</span> <span >${formatCurrency(JSON.parse(localStorage.getItem("total_price_product")))}</span> </bdi></span>
                       </p>
                       <p class="woocommerce-mini-cart__buttons buttons">
                           <a href="{{ route('cart') }}" class="button wc-forward">Ver carrito</a>
                           <a href="{{ route('cart') }}" class="button checkout wc-forward">Finalizar compra</a>
                       </p>
                   </div>
               </div>`;


           let noList = `<div class="widget woocommerce widget_shopping_cart">
                           <div class="widget_shopping_cart_content">
                               <p class="woocommerce-mini-cart__empty-message">No hay productos en el carrito.</p>
                           </div>
                       </div>`;

           if (arr_cart_products.length >= 1) {
               $('#arr_cart_products').empty().append(list)
           }else{
               $('#arr_cart_products').empty().append(noList)
           }
           
      
   }

    function modalConfirm(params) {
        let html = ``

        /* inicio del append de la modal a mostrar la info */
        if(window.screen.width >= 767 ){
                html += `   <div class="ast-content-main-wrapper">
                                <div class="ast-content-main">
                                    <div class="ast-lightbox-content">
                                        <div class="ast-content-main-head">
                                            <a onclick="modalCloseHistory()" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                        </div>
                                        <div id="ast-quick-view-content" class="woocommerce single-product" style="max-width: 982px; max-height: 673px;min-width:500px;min-height:300px">
                                            <div class="ast-woo-product">
                                                <div id="product-245" class="product post-245 type-product status-publish has-post-thumbnail product_cat-alimentos-para-mascotas ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image first instock featured shipping-taxable purchasable product-type-simple">
                                                    <div class="summary entry-summary" style="width:100%;height:600px">
                                                        <div class="summary-content">`;}
                                                    html += `<article class="post-97 page type-page status-publish ast-article-single"`; if(window.screen.width >= 767 ){ html += `style="padding:0px !important"` } html += `>`;
                    if(window.screen.width <= 767 ){ html += `  <div class="ast-content-main-head">
                                                                    <a onclick="modalCloseHistory()" style="right: 15px;top: 22px;" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                                                                </div>` }
                                                    html += `   <header class="entry-header ast-no-thumbnail ast-no-meta">
                                                                    <h1 style="text-align:center" class="entry-title" itemprop="headline">Resumen de compra</h1>	
                                                                </header>
                                                                <div class="entry-content clear" itemprop="text">    
                                                                    <div class="woocommerce">
                                                                        <div class="woocommerce-notices-wrapper"></div>
                                                                        <form class="woocommerce-cart-form"  >
                                                                            <table class=" woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th colspan="4" style="border-bottom: none;text-align: center" style="text-align: center" class="product-thumbnail"> Productos</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Producto</th>
                                                                                        <th scope="col">Precio</th>
                                                                                        <th scope="col">Cantidad</th>
                                                                                        <th scope="col">Subtotal</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >`;
                                arr_cart_productss.forEach(element => { html += `   <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td  data-title="Producto" > ${element.titulo} </td>
                                                                                        <td  data-title="Precio" >$ ${formatCurrency( element.price)} </td>
                                                                                        <td  data-title="Cantidad" >${ element.unit } </td>
                                                                                        <td  data-title="Subtotal" >$ ${ formatCurrency(element.total) } </td>
                                                                                    </tr>`;});
                                                                    html += `   </tbody>
                                                                            </table>`;
                                                                if(authentication === false){
                                                                    html += `<table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align:right" colspan="4" scope="col">Despacho</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td style="text-align:right" colspan="4" data-title="Despacho" >$ ${ formatCurrency(despacho)} </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>`;}
                                                                    html += `<table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align:right" colspan="4" scope="col">Total</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td style="text-align:right" colspan="4" data-title="Total" >$ ${ formatCurrency(total + despacho)} </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div style="margin-bottom:20px" class="elementor-element elementor-element-6eab4b7 elementor-align-center elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="6eab4b7" data-element_type="widget" data-widget_type="button.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="elementor-button-wrapper">
                                                                                        <button type="button" class="checkout-button button alt wc-forward" onclick="modalCloseHistory()" > Regresar</button>
                                                                                        <button type="button" class="checkout-button button alt wc-forward" id="finish-pay" onclick="EnviarCompra()">Confirmar </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </form>
                                                                    </div>        
                                                                </div>        
                                                            </article>`;
            if(window.screen.width >= 767 ){ html += `  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`}
        /* final del append de la modal a mostrar la info */
                            
        $('#ast-quick-view-modal').empty().append(html)
        if(window.screen.width <= 767 ){
            $('.ast-quick-view-loader').removeClass('ast-quick-view-loader')
            $('#ast-quick-view-modal').css('background','#fff')
        }
        $('.ast-quick-view-bg').addClass('ast-quick-view-bg-ready')
        $('#ast-quick-view-modal').addClass('open stick-add-to-cart')
    }


    function modalCloseHistory() {
        $('.ast-quick-view-bg').removeClass('ast-quick-view-bg-ready')
        $('#ast-quick-view-modal').removeClass('open stick-add-to-cart')
    }

    function costo_despacho(params){
        if(params === 0){
            total = JSON.parse(localStorage.getItem("total_price_product"))
        }
        console.log('total',total)
        console.log('despacho',despacho)
        
        let amount = {!! $envio !!}
        let monto = {!! $monto !!}
        $.ajax({
            type: "get",
            url: "/auth/check",
            data:{},
            success: function (data) {
                authentication = (data === '1') ? true : false
                if(authentication === true){
                    despacho =  0
                    localStorage.setItem("despacho", despacho  )
                }else{
                    
                    arr_cart_productss.forEach(element => {
                        if(element.precio_envio === 0){
                            $('#despacho-amount').empty().append(0)
                            despacho =  0
                            return 0
                        }else{
                            if( total > monto ){
                                $('#despacho-amount').empty().append(0)
                                despacho =  0
                                return 0
                            }else{
                                $('#despacho-amount').empty().append(formatCurrency(amount))
                                despacho = amount
                                localStorage.setItem("despacho", amount  )
                            }
                        }
                    });

                    $('#despachohtmluser').empty().append(` 
                                <tr>
                                    <th>Despacho</th>
                                    <td id="despacho"  data-title="Despacho"><span style="font-weight: normal !important" class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$ </span> <span id="despacho-amount" >${formatCurrency(despacho)}</span></bdi></span></td>
                                </tr>
                                    
                                <tr >
                                    <th>Subtotal</th>
                                    <td id="Subtotal" data-title="Subtotal"><span style="font-weight: normal !important" class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span> ${formatCurrency(total)}</bdi></span></td>
                                </tr>

                                
                                <tr >
                                    <th>Total</th>
                                    <td id="total" data-title="Total"><strong><span style="font-weight: normal !important"  class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span> ${formatCurrency(total + despacho)}</bdi></span></strong> </td>
                                </tr>`)
                }
                
            },
        });
        
        
    }


    function EnviarCompra(){
        
        $('#confirm-pay').hide()
        modalCloseHistory()
        $('#load').show()
        var total = JSON.parse(localStorage.getItem("total_price_product"))
        $.ajax({
            type: "get",
            url: "/payment-pay",
            data:{
                "_token": "{{ csrf_token() }}",
                "arr_cart_productss": arr_cart_productss,
                "despacho": despacho,
                "total":total + despacho
            },
            success: function (data) {
                $('#token_ws').val(data.response.token);
                $('#form_pay_wapay').attr("action", data.response.url);
                $('#load').hide()
                $('#finish-pay').show()
                localStorage.clear("total_price_product")

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
        
    }




    function formatCurrency (number) {
        return new Intl.NumberFormat('de-DE', {
            currency: 'USD',
            minimumFractionDigits: 0
        }).format(number);
    }
    

    

    

</script>
@endsection
