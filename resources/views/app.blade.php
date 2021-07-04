<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Mundo Crossfire</title>

    @yield('meta')

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="apple-touch-icon" href="{{asset('images/ico/ico.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/ico.ico')}}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C%7CMerriweather%3A700%2C&amp;display=fallback&amp;ver=3.0.1' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=5.6' media='all' />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-app.css') }}">

    @yield('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>

        

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }
        .float:hover {
            text-decoration: none;
            color: #25d366;
            background-color:#fff;
        }

        .my-float{
            margin-top:16px;
        }
        .elementor-4427 .elementor-element.elementor-element-a584ef8{
            padding-top: 20px !important
        }



        /* imagenes rotas */
        img {
            display:block;
            position:relative;
            overflow:hidden !important;
        }
        img:before {
            display:block;
            content: " ";
            width: 100%;
            height: 100%;
            position: absolute;
            color:#eee;
            background-color:#eee;
            border-radius: inherit;
        }


        *{
            font-family: 'Roboto', sans-serif !important;
        }



    </style>


</head>

@if (\Request::is('shop'))

    <body
        class="archive post-type-archive post-type-archive-product wp-custom-logo theme-astra woocommerce woocommerce-page woocommerce-no-js ast-desktop  ast-two-container ast-no-sidebar astra-3.0.1 ast-header-custom-item-outside columns-3 tablet-columns-3 mobile-columns-1 ast-woo-shop-archive ast-woocommerce-cart-menu ast-inherit-site-logo-transparent ast-blog-grid-1 ast-blog-layout-1 ast-pagination-default ast-above-mobile-menu-align-inline ast-default-menu-enable ast-default-above-menu-enable ast-default-below-menu-enable ast-full-width-layout ast-sticky-main-shrink ast-sticky-header-shrink ast-inherit-site-logo-sticky ast-primary-sticky-enabled ast-woocommerce-pagination-square elementor-default elementor-kit-3049 astra-addon-3.0.0">
    @elseif(\Request::is('my-account') || \Request::is('cart') || \Request::is('account-setting') )

        <body
            class="page-template-default page page-id-99 wp-custom-logo theme-astra woocommerce-account woocommerce-page woocommerce-no-js ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-3.0.1 ast-header-custom-item-outside ast-single-post ast-woocommerce-cart-menu ast-inherit-site-logo-transparent ast-above-mobile-menu-align-inline ast-default-menu-enable ast-default-above-menu-enable ast-default-below-menu-enable ast-full-width-layout ast-sticky-main-shrink ast-sticky-header-shrink ast-inherit-site-logo-sticky ast-primary-sticky-enabled ast-normal-title-enabled elementor-default elementor-kit-3049 astra-addon-3.0.0">
        @elseif(\Request::is('shop-detail/*') || \Request::is('conocenos') ) 

            <body class="product-template-default single single-product postid-243 wp-custom-logo theme-astra woocommerce woocommerce-page woocommerce-no-js ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-3.0.1 ast-header-custom-item-outside ast-blog-single-style-1 ast-custom-post-type ast-single-post ast-woocommerce-cart-menu ast-inherit-site-logo-transparent ast-above-mobile-menu-align-inline ast-default-menu-enable ast-default-above-menu-enable ast-default-below-menu-enable ast-full-width-layout ast-sticky-main-shrink ast-sticky-header-shrink ast-inherit-site-logo-sticky ast-primary-sticky-enabled rel-up-columns-4 tablet-rel-up-columns-3 mobile-rel-up-columns-2 ast-normal-title-enabled elementor-default elementor-kit-3049 astra-addon-3.0.0">
       
        @elseif(\Request::is('cart') || \Request::is('registro') || \Request::is('password/reset') || \Request::is('password/reset/*') || \Request::is('history') || \Request::is('success/*')  || \Request::is('success-invite/*') || \Request::is('error/*'))

            <body class="page-template-default page page-id-97 wp-custom-logo theme-astra woocommerce-cart woocommerce-page woocommerce-no-js ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-3.0.1 ast-header-custom-item-outside ast-single-post ast-woocommerce-cart-menu ast-inherit-site-logo-transparent ast-above-mobile-menu-align-inline ast-default-menu-enable ast-default-above-menu-enable ast-default-below-menu-enable ast-full-width-layout ast-sticky-main-shrink ast-sticky-header-shrink ast-inherit-site-logo-sticky ast-primary-sticky-enabled ast-normal-title-enabled elementor-default elementor-kit-3049 astra-addon-3.0.0">
            @else

                <body  class="home page-template-default page page-id-95 wp-custom-logo theme-astra woocommerce-no-js ast-desktop ast-page-builder-template ast-no-sidebar astra-3.0.1 ast-header-custom-item-outside ast-single-post ast-woocommerce-cart-menu ast-inherit-site-logo-transparent ast-theme-transparent-header ast-above-mobile-menu-align-inline ast-default-menu-enable ast-default-above-menu-enable ast-default-below-menu-enable ast-full-width-layout ast-sticky-main-shrink ast-sticky-header-shrink ast-inherit-site-logo-sticky ast-primary-sticky-enabled elementor-default elementor-kit-3049 elementor-page elementor-page-95 astra-addon-3.0.0">
@endif



<div class="hfeed site" id="page">
    <a class="skip-link screen-reader-text" href="#content">Ir al contenido</a>
    @include('layouts.header')
    <div id="content" class="site-content">
        @yield('content')
    </div>
    @include('layouts.foorter')
</div>
<div id="seccion-categorias"></div>
</div>
</div>
<a id="ast-scroll-top" class="ast-scroll-top-icon ast-scroll-to-top-right">
    <span class="screen-reader-text">Ir arriba</span>
</a>
<div class="ast-quick-view-bg">
    <div class="ast-quick-view-loader blockUI blockOverlay"></div>
</div>
<div id="ast-quick-view-modal">
    <div class="ast-content-main-wrapper">
        <div class="ast-content-main">
            <div class="ast-lightbox-content">
                <div class="ast-content-main-head">
                    <a onclick="methodModalClose()" id="ast-quick-view-close" class="ast-quick-view-close-btn"></a>
                </div>
                <div id="ast-quick-view-content" class="woocommerce single-product"
                    style="max-width: 982px; max-height: 673px;">
                    <div class="ast-woo-product">
                        <div id="product-245"
                            class="product post-245 type-product status-publish has-post-thumbnail product_cat-alimentos-para-mascotas ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image first instock featured shipping-taxable purchasable product-type-simple">
                            <div class="ast-qv-image-slider flexslider images">
                                <div class="ast-qv-slides slides">
                                    <li class="woocommerce-product-gallery__image"><img id="current_product_img" style="width:300%;height:300px;object-fit: contain"
                                            class="attachment-shop_single size-shop_single wp-post-image" alt=""
                                            loading="lazy"
                                            title="kisspng-dog-chow-nestl-purina-petcare-company-chow-chow-chow-chow-dog-5b1509b33f92c5.3174390215281053952604"
                                            
                                            ></li>
                                </div>
                            </div>
                            <div class="summary entry-summary" style="max-height: 350.906px;">
                                <div class="summary-content">
                                    <a 
                                        class="ast-loop-product__link">
                                        <h1 id="current_product_title" class="product_title entry-title"></h1>
                                    </a>


                                    <div id="current_product_price"></div>




                                    <div class="woocommerce-product-details__short-description">
                                        <p id="current_product_description" style="margin-bottom:0px"></p>
                                    </div>


                                    <form class="cart stick"
                                        
                                        method="post" enctype="multipart/form-data">

                                        <div class="quantity buttons_added"><a style="cursor:pointer" onclick="unitProduct('minus')" 
                                                class="minus">-</a>
                                            <label class="screen-reader-text" for="unit_product"></label>
                                            <input type="number" id="unit_product" class="input-text qty text" 
                                                step="1" min="1" max="" name="quantity" value="1" title="Cantidad"
                                                size="4" placeholder="" inputmode="numeric">
                                            <a onclick="unitProduct('plus')" style="cursor:pointer" class="plus">+</a>
                                        </div>

                                        <button type="button" name="add-to-cart" onclick="cartProduct()"
                                            class="single_add_to_cart_button button alt">Añadir al carrito</button>

                                    </form>


                                    <div class="product_meta">



                                        <span class="posted_in">Categoría: <a
                                                id="current_product_category"
                                                rel="tag"></a></span>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src='{{ asset('js/swiper.min48f5.js')}}'></script>
@yield('js')
<script>




    
    

    


    let arr_cart_products = (JSON.parse(localStorage.getItem("arr_cart_products"))) ? JSON.parse(localStorage.getItem("arr_cart_products")) : []

   
    function addItemCart() {
           
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

    function addItemCartsTbodyCart() {
        
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


    function deleteItemCart(params,unit,price) {
            localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) - unit) )
            localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) - price ))
            
            $('#total_items').attr('data-cart-total', JSON.parse(localStorage.getItem("unit_product")));
            $('#total_price_items').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) );
            arr_cart_products.splice(params,1)
            localStorage.setItem("arr_cart_products", JSON.stringify( arr_cart_products ))
      
        addItemCart()
            

    }
    function unitProduct(params) {
        const units = parseInt($('#unit_product').val())
        switch (params) {
            
            case 'plus':
                $('#unit_product').val(units + 1)
                break;
        
            case 'minus':
                if(parseInt($('#unit_product').val()) <= 1){
                    $('#unit_product').val(1)
                }else{
                    $('#unit_product').val(units - 1)
                }
                break;
        
            default:
                break;
        }
    }
    function cartProduct() {
            

            $.ajax({
                type: "get",
                url: "/auth/check",
                data:{},
                success: function (data) {
                    
                    const req = JSON.parse(localStorage.getItem("current_product"))
                    
                    const units = parseInt($('#unit_product').val())
                    let price_unit = 0

                    let authentication = (data === '1') ? true : false
                    
                    if(req.indicador_promocion === 1){
                        price_unit = req.precio_promocion
                    }else{
                        if(authentication === true){
                            price_unit = req.precio_afiliados
                        }else{
                            price_unit = req.precio_no_afiliados
                        }
                    }

            
                    
                    const total_price =  (price_unit * units)
                    if(arr_cart_products.find( i => i.titulo === req.titulo)){
                        let arr = arr_cart_products.filter( (i ) => i.titulo === req.titulo );
                            
                        arr_cart_products.find( i => i.titulo === req.titulo)['unit'] = arr_cart_products.find( i => i.titulo === req.titulo)['unit'] + units
                        arr_cart_products.find( i => i.titulo === req.titulo)['total'] = arr_cart_products.find( i => i.titulo === req.titulo)['total'] + total_price
                        
                    }else{
                        arr_cart_products.push({id:req.id, titulo: req.titulo,unit:units, price: price_unit,total:total_price,img: req.img_principal, precio_envio: req.precio_envio })
                    }

                    localStorage.setItem("arr_cart_products", JSON.stringify( arr_cart_products ))

                    localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) + units) )
                    localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) + total_price ))

                    $('#total_items').attr('data-cart-total', JSON.parse(localStorage.getItem("unit_product")));
                    $('#total_price_items').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) );
                    addItemCart()
                    arr_cart_products.forEach( (element, index) => {
                        $(`#format-in-html-modal-emergente-${index}`).text(formatCurrency(parseInt($(`#format-in-html-modal-emergente-${index}`).text())))
                    });
                },
            });
        }
</script>
<script>
    $('#total_items').attr('data-cart-total', ( JSON.parse(localStorage.getItem("unit_product")) ) ? JSON.parse(localStorage.getItem("unit_product")) : 0 );
    if(JSON.parse(localStorage.getItem("total_price_product"))){
        $('#total_price_items').text('$'+' '+  formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) ) 
    }else{
        $('#total_price_items').text('$ 0') 
    }
    
    addItemCart()
    function formatCurrency (number) {
        return new Intl.NumberFormat('de-DE', {
            currency: 'USD',
            minimumFractionDigits: 0,
        }).format(number);
    }
</script>
<script>
    arr_cart_products.forEach( (element, index) => {
        $(`#format-in-html-modal-emergente-${index}`).text(formatCurrency(parseInt($(`#format-in-html-modal-emergente-${index}`).text())))
    });
    
</script>
<script>
    jQuery(window).load(function(){
        //Cuando se carga todo el contenido.
        jQuery("#content").css("min-height", (jQuery(window).height()-jQuery("footer").outerHeight()-jQuery("header").outerHeight()+"px"));
    }).resize(function(){
        //Cuando se escala la pantalla.
        jQuery("#content").css("min-height", (jQuery(window).height()-jQuery("footer").outerHeight()-jQuery("header").outerHeight()+"px"));
    });
    jQuery(document).ready(function(){
        //Cuando el DOM está disponible.
        jQuery("#content").css("min-height", (jQuery(window).height()-jQuery("footer").outerHeight()-jQuery("header").outerHeight()+"px"));
    })

    let vars_global = {}
    $.ajax({ url: '/vars', success: function(res) { vars_global = res }});

</script>
</body>

</html>
