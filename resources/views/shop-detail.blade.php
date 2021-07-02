@extends('app')

@section('meta')
    <meta name="description" content="{{$producto[0]->descripcion}}">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{$producto[0]->titulo}} - Petcicla">
    <meta itemprop="description" content="{{$producto[0]->descripcion}}">
    <meta itemprop="image" content="{{ asset($producto[0]->img_principal) }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="petcicla.cl">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$producto[0]->titulo}} - Petcicla">
    <meta property="og:description" content="{{$producto[0]->descripcion}}">
    <meta property="og:image" content="{{ asset($producto[0]->img_principal) }}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$producto[0]->titulo}} - Petcicla">
    <meta name="twitter:description" content="{{$producto[0]->descripcion}}">
    <meta name="twitter:image" content="{{ asset($producto[0]->img_principal) }}">
@endsection


@section('css')

@endsection
@section('content')

    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-95 page type-page status-publish ast-article-single" id="post-95" >
                    <header class="entry-header ast-header-without-markup"></header><!-- .entry-header -->
                    <div class="entry-content clear" itemprop="text">
                        <div class="elementor elementor-95">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">
                                    
                                        <div class="ast-woocommerce-container">


                                            <div class="woocommerce-notices-wrapper"></div>
                                            <div id="product-243"  class="ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-243 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                             
                        
                                        
                        
                                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                    data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;"><a href="#"
                                                        class="woocommerce-product-gallery__trigger"><img draggable="false" role="img" class="emoji"
                                                            alt="🔍" src="https://s.w.org/images/core/emoji/13.0.1/svg/1f50d.svg"></a>
                                                            <div style=" width:100% !important" class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b7bcb4e" data-id="b7bcb4e">
                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                    <div class="elementor-widget-wrap">
                                                                        <div class="elementor-element elementor-element-0e80b58 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides"
                                                                            data-id="0e80b58" data-element_type="widget"
                                                                            data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}"
                                                                            data-widget_type="slides.default">
                                                                            <div class="elementor-widget-container">
                                                                                <div class="elementor-swiper">
                                                                                    <div class="elementor-slides-wrapper elementor-main-swiper swiper-container"
                                                                                        dir="ltr" data-animation="fadeInUp">
                                                                                        <div class="swiper-wrapper elementor-slides">
                                                                                            @foreach ($imagenes as $item)
                                                                                                <div class="elementor-repeater-item-84bbb56 swiper-slide">
                                                                                                    <div class="swiper-slide-bg"  style="background-image:url({{$item->img}}); width:100% !important ; background-size: contain !important;">
                                                                                                    </div>
                                                                                                    <div class="swiper-slide-inner" >
                                                                                                        <div class="swiper-slide-contents">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <div class="swiper-pagination">
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-swiper-button elementor-swiper-button-prev">
                                                                                            <i class="fas fa-chevron-left"
                                                                                                aria-hidden="true"></i>
                                                                                            <span
                                                                                                class="elementor-screen-only">Previous</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-swiper-button elementor-swiper-button-next">
                                                                                            <i class="fas fa-chevron-right"
                                                                                                aria-hidden="true"></i>
                                                                                            <span
                                                                                                class="elementor-screen-only">Next</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                
                                                    
                                                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                                </div>
                        
                                                <div class="summary entry-summary">
                                                    <nav class="woocommerce-breadcrumb"><a
                                                            href="{{ route('/') }}">Inicio</a>&nbsp;/&nbsp;<a>{{$producto[0]->nombre_categoria}}</a>&nbsp;/&nbsp;{{$producto[0]->titulo}}</nav>
                                                    <h1 class="product_title entry-title">{{$producto[0]->titulo}}</h1>
                                                    <p class="price"><span class="product_title entry-title" style="font-size:22px">Normal </span><span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-product-normal-{{ $producto[0]->id }}">{{$producto[0]->precio_no_afiliados}}</span></bdi></span></p>
                        
                        
                        
                        
                                                        @if ($producto[0]->indicador_promocion === 1)
                                                            <p class="price" style="color: #D94F4F !important"><span class="product_title entry-title" style="font-size:22px">Oferta </span><span class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-product-promocion-{{ $producto[0]->id }}">{{$producto[0]->precio_promocion}}</span></bdi></span></p>
                                                        @else
                                                            <p class="price"  style="color: #5CBBAC !important"><span class="product_title entry-title" style="font-size:22px">Afiliado </span><span class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-product-afiliado-{{ $producto[0]->id }}">{{$producto[0]->precio_afiliados}}</span></bdi></span></p>
                                                        @endif
                        
                        
                        
                                                    
                        
                        
                                                    <div class="woocommerce-product-details__short-description">
                                                        <p>{{$producto[0]->descripcion}}</p>
                                                    </div>
                        
                        
                                                    <form class="cart"
                                                        method="post" enctype="multipart/form-data">
                        
                                                        <div class="quantity buttons_added"><a  style="cursor:pointer" onclick="unitProduct_d('minus')"  class="minus">-</a>
                                                            <label class="screen-reader-text" for="unit_product_d">{{$producto[0]->titulo}}
                                                                cantidad</label>
                                                            <input type="number" id="unit_product_d" class="input-text qty text" step="1"
                                                                min="1" max="" name="quantity" value="1" title="Cantidad" size="4" placeholder=""
                                                                inputmode="numeric">
                                                            <a  style="cursor:pointer" onclick="unitProduct_d('plus')"  class="plus">+</a>
                                                        </div>
                        
                                                        <button type="button" name="add-to-cart" value="243"
                                                            class="single_add_to_cart_button button alt" onclick="cartProduct_d({{$producto[0]}})" >Añadir al carrito</button>
                        
                                                    </form>
                        
                        
                                                    <div class="product_meta">
                        
                        
                        
                                                        <span class="posted_in">Categoría: <a rel="tag">{{$producto[0]->nombre_categoria}}</a></span>
                        
                        
                                                    </div>
                                                </div>
                        
                                                @if ( count($productos_relacionados) > 0 )
                                                
                                                    <section class="related products">
                        
                                                        <h2>Productos relacionados</h2>
                                                        
                                                        <ul class="products columns-4">
                        
                                                            @foreach($productos_relacionados->take(4) as $productos_relacionado)
                                                            <li class="ast-article-single ast-woo-product-no-review align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-242 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                                <div class="astra-shop-thumbnail-wrap"> 
                                                                    <a href="{{ route('shop-detail', $productos_relacionado->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                        <img style="width:100%;height:200px;object-fit: contain"  alt="" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyloaded" src="{{asset($productos_relacionado->img_principal)}}"></a>
                                                                        <a onclick="methodModal({{$productos_relacionado}})" style="cursor:pointer" class="ast-quick-view-text">
                                                                            Vista rápida
                                                                        </a>
                                                                    </div>
                                                                <div class="astra-shop-summary-wrap"> 
                                                                    <span class="ast-woo-product-category">
                                                                        {{$productos_relacionado->nombre_categoria}}
                                                                    </span>
                                                                    <a href="{{ route('shop-detail', $productos_relacionado->slug) }}" class="ast-loop-product__link">
                                                                        <h2 class="woocommerce-loop-product__title">{{$productos_relacionado->titulo}}</h2>
                                                                    </a>
                                                                        <span class="price">
                                                                            <span class="woocommerce-Price-amount amount">Normal
                                                                                <bdi><span class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-relation-normal-{{ $productos_relacionado->id }}"> {{$productos_relacionado->precio_no_afiliados}}</span></bdi>
                                                                            </span>
                                                                        </span>
                                                                    @if ($productos_relacionado->indicador_promocion === 1)
                                                                        <span class="price">
                                                                            <span style="color: #D94F4F !important" class="woocommerce-Price-amount amount">Oferta
                                                                                <bdi><span class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-relation-promocion-{{ $productos_relacionado->id }}"> {{$productos_relacionado->precio_promocion}}</span></bdi>
                                                                            </span>
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            <span style="color: #5CBBAC !important" class="woocommerce-Price-amount amount">Afiliado
                                                                                <bdi><span  class="woocommerce-Price-currencySymbol">$ </span> <span id="format-in-html-relation-afiliado-{{ $productos_relacionado->id }}"> {{$productos_relacionado->precio_afiliados}}</span></bdi>
                                                                            </span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </section>
                        
                                                @endif
                        
                        
                        
                        
                                            </div>
                        
                        
                        
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function methodModal(req) {

            localStorage.removeItem('current_product');
            localStorage.setItem("current_product", JSON.stringify( req ))


            let precio_html = ``

            if(req.indicador_promocion === 1){
                precio_html = `
                <span class="price" >
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-modal-home-normal-${req.id}"> ${formatCurrency(JSON.parse(req.precio_no_afiliados))} </span>
                        </bdi>
                    </span>
                </span>
                <br />
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi style="color: #D94F4F !important">
                            Oferta <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-modal-home-promocion-${req.id}"> ${formatCurrency(JSON.parse(req.precio_promocion))} </span>
                        </bdi>
                    </span>
                </span>`;
            }else{
                precio_html = `
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-modal-home-normal-${req.id}"> ${formatCurrency(JSON.parse(req.precio_no_afiliados))} </span>
                        </bdi>
                    </span>
                </span>
                <br />
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi style="color: #5CBBAC !important">
                            Socio <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-modal-home-afiliado-${req.id}"> ${formatCurrency(JSON.parse(req.precio_afiliados))} </span>
                        </bdi>
                    </span>
                </span>`;
            }

            $('#current_product_price').empty().append(precio_html)


            //$('#current_product_price').text('$'+' '+formatCurrency(req.precio_no_afiliados) )
            $('#current_product_img').attr('src', req.img_principal);
            $('#current_product_title').text(req.titulo)
            $('#current_product_category').text(req.nombre_categoria)
            $('#current_product_description').text(req.descripcion)

            $('.ast-quick-view-bg').addClass('ast-quick-view-bg-ready')
            $('#ast-quick-view-modal').addClass('open stick-add-to-cart')
        }

        function methodModalClose() {
            $('.ast-quick-view-bg').removeClass('ast-quick-view-bg-ready')
            $('#ast-quick-view-modal').removeClass('open stick-add-to-cart')
            $('#unit_product').val(1)
        }
        function cartProduct(req) {
            const units = parseInt($('#unit_product').val())
            const price_unit = req.precio_no_afiliados
            const total_price =  (price_unit * units)
            
            localStorage.setItem("unit_product", JSON.stringify( JSON.parse( localStorage.getItem("unit_product")) + units) )
            localStorage.setItem("total_price_product", JSON.stringify( JSON.parse( localStorage.getItem("total_price_product")) + total_price ))

            

            $('#total_items').attr('data-cart-total', JSON.parse(localStorage.getItem("unit_product")));
            $('#total_price_items').text('$'+' '+formatCurrency(JSON.parse(localStorage.getItem("total_price_product"))) );
        }
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
                                    <img style="width:100%;height:300px;object-fit: contain"  src="${element.img}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px">${element.titulo}</a>
                                    <span class="quantity">${element.unit} × 
                                        <span class="woocommerce-Price-amount amount"><bdi>
                                        <span class="woocommerce-Price-currencySymbol">$</span>${element.price}</bdi></span>
                                    </span>				
                                </li>
                                `;
                            });

                        
            list +=     `</ul>
                        <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount">
                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>${JSON.parse(localStorage.getItem("total_price_product"))}</bdi></span>
                        </p>
                        <p class="woocommerce-mini-cart__buttons buttons">
                            <a href="http://localhost/wordpress/cart/" class="button wc-forward">Ver carrito</a>
                            <a href="http://localhost/wordpress/checkout/" class="button checkout wc-forward">Finalizar compra</a>
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
        function cartProduct_d(req) {

            $.ajax({
                type: "get",
                url: "/auth/check",
                data:{},
                success: function (data) {



            const units = parseInt($('#unit_product_d').val())



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
                arr_cart_products.push({id:req.id, titulo: req.titulo,unit:units, price: price_unit,total:total_price,img: req.img_principal, precio_envio: req.precio_envio  })
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
        function unitProduct_d(params) {
            const units = parseInt($('#unit_product_d').val())
            switch (params) {
                
                case 'plus':
                    $('#unit_product_d').val(units + 1)
                    break;
            
                case 'minus':
                    if(parseInt($('#unit_product_d').val()) <= 1){
                        $('#unit_product_d').val(1)
                    }else{
                        $('#unit_product_d').val(units - 1)
                    }
                    break;
            
                default:
                    break;
            }


            


        }
        function formatCurrency (number) {
        return new Intl.NumberFormat('de-DE', {
            currency: 'USD',
            minimumFractionDigits: 0
        }).format(number);
    }




   




        let product = {!! $producto !!}

        if( $(`#format-in-html-product-normal-${product[0].id}`).length > 0 ){
            $(`#format-in-html-product-normal-${product[0].id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-normal-${product[0].id}`).text())))    
        }
        if( $(`#format-in-html-product-afiliado-${product[0].id}`).length > 0 ){
            $(`#format-in-html-product-afiliado-${product[0].id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-afiliado-${product[0].id}`).text())))    
        }
        if( $(`#format-in-html-product-promocion-${product[0].id}`).length > 0 ){
            $(`#format-in-html-product-promocion-${product[0].id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-promocion-${product[0].id}`).text())))    
        }
        

        let relacionados = {!! $productos_relacionados !!}
        relacionados.forEach(element => {
            if( $(`#format-in-html-relation-normal-${element.id}`).length > 0 ){
                $(`#format-in-html-relation-normal-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-relation-normal-${element.id}`).text())))   
            }
            if( $(`#format-in-html-relation-promocion-${element.id}`).length > 0 ){
                $(`#format-in-html-relation-promocion-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-relation-promocion-${element.id}`).text())))   
            }
            if( $(`#format-in-html-relation-afiliado-${element.id}`).length > 0 ){
                $(`#format-in-html-relation-afiliado-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-relation-afiliado-${element.id}`).text())))   
            }   
        });

    </script>
@endsection
