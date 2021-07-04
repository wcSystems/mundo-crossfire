@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="name" content="Mundo Crossfire">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')
    <style>
        #text-force, 
        #text-force > h2,
        #text-force > h3,
        #text-force > h2 > strong, 
        #text-force > h3 > strong{
            font-family: 'PT Sans important', sans-serif !important;}
        .display-table{
            margin: auto !important}
        .seccionMarca50{
            width: 100% !important;}
        .ql-align-center {
            text-align: center;}
        .size-slider-home{
            max-width: 100% !important;}
        .size-global-mobile{
            padding-top: 40px !important;
            padding-bottom: 20px !important;
            padding-left:0px !important;
            padding-right:0px !important}
        .height-movil-banner{
            max-height: 250px !important}
        .box-expand-pd{
            padding:20px !important}
        .box-desktop-1 {
            margin-bottom: 10px !important;}
        .box-desktop-2 {
            margin-top: 10px !important;
            margin-bottom: 10px !important;}
        .box-desktop-3 {
            margin-top: 10px !important;}
        .img-huella-home{
            margin: auto;
            display: block;}
        .entry-content p{
            margin-bottom: 0px !important;}
        .ql-align-center > img{
            margin: auto !important}

        @media (min-width:498px) {
            .height-movil-banner{
                max-height: 100% !important}}
        @media (min-width:512px) {
            .img-huella-home{
                display: inline;}}
        @media (max-width:512px) {
            .marcas_mobile{ 
                display: block !important; }
            .marcas_desktop{
                display: none;}}
        @media (min-width:1025px) {
            .box-expand-pd{
                padding:40px !important}
            .height-block {
                height: 100%;}
            .box-desktop-1 {
                margin:0 !important;
                margin-right: 20px !important}
            .box-desktop-2 {
                margin:0 !important;
                margin: 0px 20px !important}
            .box-desktop-3 {
                margin:0 !important;
                margin-left: 20px !important}
            .size-slider-home{
                max-width: 95% !important;}
            .height-block {
                height: 100%;}
            .display-table{
                display: table-cell !important; 
                vertical-align: middle !important;}
            .seccionMarca50{
                width: 50% !important;}
            .text-br{
                display: block}}
        @media (max-width: 921px) {
            .imgDestacados{
                height: 100px !important;}}
    </style>
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-95 page type-page status-publish ast-article-single" id="post-95">
                    <header class="entry-header ast-header-without-markup"></header>
                    <div class="entry-content clear" itemprop="text">
                        <div class="elementor elementor-95">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">

                                    <section  class=" size-global-mobile elementor-section elementor-top-section elementor-element elementor-element-a584ef8 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default">
                                        <div class="elementor-background-overlay"></div>
                                        <div class="size-slider-home elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                @if(isset($banners))
                                                    @if(count($banners) >= 1)
                                                        <div style="margin:0 !important; padding:0 !important" class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b7bcb4e"  data-id="b7bcb4e">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div  class=" elementor-widget-wrap">
                                                                    <div class=" elementor-element elementor-element-0e80b58 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides" data-id="0e80b58" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}" data-widget_type="slides.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-swiper">
                                                                                <div class="elementor-slides-wrapper elementor-main-swiper  swiper-container" dir="ltr" data-animation="fadeInUp">
                                                                                    <div class="swiper-wrapper elementor-slides">
                                                                                        @foreach ($banners as $item)
                                                                                            <div class="height-movil-banner  elementor-repeater-item-84bbb56 swiper-slide">
                                                                                                <div  class="swiper-slide-bg" style="background-image:url({{$item->img_banner}});background-repeat: no-repeat;background-size: contain !important;"></div>
                                                                                                <div class="swiper-slide-inner">
                                                                                                    <div class="swiper-slide-contents"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="swiper-pagination"></div>
                                                                                    <div class="elementor-swiper-button elementor-swiper-button-prev">
                                                                                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                                                                                        <span class="elementor-screen-only">Previous</span>
                                                                                    </div>
                                                                                    <div class="elementor-swiper-button elementor-swiper-button-next">
                                                                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                                                                        <span class="elementor-screen-only">Next</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if(isset($seccion))
                                                    <div style="z-index:10" class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-39d5465"  data-id="39d5465">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-8c51def elementor-widget elementor-widget-heading" data-id="8c51def" data-element_type="widget" data-widget_type="heading.default">
                                                                    <div id="text-force" class="elementor-widget-container" style="">
                                                                        <?php echo $seccion->texto; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-30e77c9 elementor-widget elementor-widget-image" data-id="30e77c9" data-element_type="widget" data-widget_type="image.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-image">
                                                                            <img style="width:100%;height:135px;object-fit: contain"   alt="" src="{{$seccion->img}}">										
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <section class="elementor-section elementor-inner-section elementor-element elementor-element-cd32c4c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cd32c4c" data-element_type="section">
                                                                    <div class="elementor-container elementor-column-gap-default">
                                                                        <div class="elementor-row">
                                                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-99147a8" data-id="99147a8" data-element_type="column">
                                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                                    <div class="elementor-widget-wrap">
                                                                                        <div class="elementor-element elementor-element-d66ca90 elementor-align-left elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="d66ca90" data-element_type="widget" data-widget_type="button.default">
                                                                                            <div class="elementor-widget-container">
                                                                                                <div style="text-align: center" class="elementor-button-wrapper">
                                                                                                    <a href="{{$seccion->link}}" target="_blank" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                                        <span class="elementor-button-content-wrapper">
                                                                                                            
                                                                                                            <span class="elementor-button-text" >Compra aquí</span>
                                                                                                        </span>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </section>

                                    @if(isset($caja1) || isset($caja2) || isset($caja3) )
                                        <section style="background-color: #51B6B2 !important" class="box-expand-pd elementor-section elementor-top-section elementor-element elementor-element-3634f3d elementor-section-boxed elementor-section-height-default elementor-section-height-default"  data-id="3634f3d"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-container elementor-column-gap-default" style="max-width: 100% !important">
                                                <div class="elementor-row" style="justify-content: center;" >
                                                    @if(isset($caja1))
                                                        <div class="box-desktop-1 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-10836f8"  data-id="10836f8"   data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div style="display: table;margin:0px !important" class="height-block elementor-column-wrap elementor-element-populated">
                                                                <div style="display: table-cell; vertical-align: middle;"  class="elementor-widget-wrap">
                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                <?php echo $caja1->contenido; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(isset($caja2))
                                                        <div class="box-desktop-2 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-a2e95a1"  data-id="a2e95a1"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div style="display: table;margin:0px !important"  class=" height-block elementor-column-wrap elementor-element-populated">
                                                                <div style="display: table-cell; vertical-align: middle;" class="elementor-widget-wrap">
                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                <?php echo $caja2->contenido; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-d6217da elementor-align-center elementor-mobile-align-justify elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="d6217da" data-element_type="widget"  data-widget_type="button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-button-wrapper">
                                                                                <a href="{{ route('subscription.index') }}"  rel="nofollow" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                    <span class="elementor-button-content-wrapper">
                                                                                        <span class="elementor-button-icon elementor-align-icon-left"></span>
                                                                                        <span class="elementor-button-text">Suscribirme</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(isset($caja3))
                                                        <div class="box-desktop-3  elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-c286143"  data-id="c286143"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div style="display: table;margin:0px !important" class="height-block elementor-column-wrap elementor-element-populated">
                                                                <div style="display: table-cell; vertical-align: middle;"  class="elementor-widget-wrap">
                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                <?php echo $caja3->contenido; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </section>
                                    @endif

                                    @if(count($productos) >= 1)
                                        <section class="elementor-section elementor-top-section elementor-element elementor-element-5031d75 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5031d75" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-background-overlay"></div>
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-155bf24" data-id="155bf24">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-e3141d4 elementor-widget elementor-widget-heading" data-id="e3141d4" data-element_type="widget" data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                                            Productos Destacados
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-da07482 elementor-widget elementor-widget-text-editor" data-id="da07482" data-element_type="widget" data-widget_type="text-editor.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-text-editor elementor-clearfix">
                                                                            Productos de alta calidad para que puedas entrenar donde sea en esta cuarentena.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-71c3b8d elementor-widget elementor-widget-shortcode" data-id="71c3b8d" data-element_type="widget" data-widget_type="shortcode.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-shortcode">
                                                                            <div class="woocommerce columns-4 ">
                                                                                <ul class="products columns-4">
                                                                                    @foreach($productos as $producto)
                                                                                        <li class="ast-article-single align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-243 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                                                                            <div class="astra-shop-thumbnail-wrap">
                                                                                                <a href="{{ route('shop-detail',$producto->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                                                    <img style="width:100%;height:100%;height:300px;object-fit: contain" alt="" src="{{asset($producto->img_principal)}}" class="imgDestacados attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload" />
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="astra-shop-summary-wrap">
                                                                                                <span class="ast-woo-product-category">
                                                                                                    @foreach($categorias as $categoria)
                                                                                                        @if($producto->id==$categoria->id)
                                                                                                            {{$categoria->nombre_categoria}}
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                </span>
                                                                                                <a href="{{ route('shop-detail',$producto->slug) }}" class="ast-loop-product__link">
                                                                                                    <h2  class="woocommerce-loop-product__title">
                                                                                                        {{$producto->titulo}}
                                                                                                    </h2>
                                                                                                </a>
                                                                                                <span class="price">
                                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                                        <bdi>
                                                                                                            <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-productos-normal-{{$producto->id}}"> {{ $producto->precio_no_afiliados }} </span>
                                                                                                        </bdi>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-6eab4b7 elementor-align-center elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="6eab4b7" data-element_type="widget" data-widget_type="button.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-button-wrapper">
                                                                            <a href="{{ route('shop') }}" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                <span class="elementor-button-content-wrapper">
                                                                                    <span class="elementor-button-icon elementor-align-icon-left"></span>
                                                                                    <span class="elementor-button-text">Ver Todos Nuestros Productos</span>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    @endif
                                    
                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-24e4ef4f elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="24e4ef4f" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_top&quot;:&quot;arrow&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d83afc9" data-id="4d83afc9">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-d2bb640 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="d2bb640" data-element_type="widget" data-widget_type="image-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-image-box-wrapper">
                                                                        <div class="elementor-image-box-content">
                                                                            <h3 class="elementor-image-box-title">
                                                                                Somos parte del grupo de trainer certificados de Venezuela 
                                                                            </h3>
                                                                            <p class="elementor-image-box-description">
                                                                                Apoyamos la misión de desarrollar proyectos de transformación a traves del entrenamiento.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-50d8274 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides" data-id="50d8274" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}" data-widget_type="slides.default">
                                                                <div class="elementor-widget-container" >
                                                                    <div class="elementor-swiper" style="height: 250px !important;display:flex !important;margin-top:-40px" >
                                                                        <div class="elementor-slides-wrapper elementor-main-swiper swiper-container" style="margin: auto" dir="ltr" data-animation="fadeInUp" >
                                                                            <div class="swiper-wrapper elementor-slides" >
                                                                                <div class="elementor-repeater-item-c39dd82 swiper-slide">
                                                                                    <div style="background-color: #833CA300; background-size: contain;width: 300px;background-repeat: no-repeat;height: 100%;background-position: center;margin: auto;background-image: url(./images/grupocycle-01.png)" ></div>
                                                                                    <div class="swiper-slide-inner" style="padding: unset !important">
                                                                                        <div class="swiper-slide-contents"> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-repeater-item-26b33b7 swiper-slide">
                                                                                    <div style="background-color: #833CA300; background-size: contain;width: 300px;background-repeat: no-repeat;height: 100%;background-position: center;margin: auto;background-image:url(./images/NUTRACYCLE-06.png)"   ></div>
                                                                                    <div class="swiper-slide-inner" style="padding: unset !important">
                                                                                        <div class="swiper-slide-contents"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-repeater-item-c91718a swiper-slide">
                                                                                    <div style="background-color: #833CA300; background-size: contain;width: 300px;background-repeat: no-repeat;height: 100%;background-position: center;margin: auto;background-image:url(./images/NEOCYCLE-06.png)"   ></div>
                                                                                    <div class="swiper-slide-inner" style="padding: unset !important">
                                                                                        <div class="swiper-slide-contents"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="swiper-pagination"> </div>
                                                                            <div class="elementor-swiper-button elementor-swiper-button-prev">
                                                                                <i class="fas fa-chevron-left" aria-hidden="true"></i>
                                                                                <span class="elementor-screen-only">Previous</span>
                                                                            </div>
                                                                            <div class="elementor-swiper-button elementor-swiper-button-next">
                                                                                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                                                                <span class="elementor-screen-only">Next</span>
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
                                    </section>

                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-1030b2a4 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1030b2a4">
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4ed6cd28" data-id="4ed6cd28">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-43360ebe elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="43360ebe">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e1448d2" data-id="e1448d2">
                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-58a0b0a elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="58a0b0a" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}" data-widget_type="form.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <form class="elementor-form" id="mensajeForm">
                                                                                                <div class="elementor-element elementor-element-269cd90 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="269cd90" data-element_type="widget" data-widget_type="image-box.default">
                                                                                                    <div class="elementor-widget-container">
                                                                                                        <div class="elementor-image-box-wrapper">
                                                                                                            <div class="elementor-image-box-content">
                                                                                                                <h3 class="elementor-image-box-title">
                                                                                                                    Contáctanos
                                                                                                                </h3>
                                                                                                                <p class="elementor-image-box-description">
                                                                                                                    Resolveremos todas tus dudas
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                                                                    <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100">
                                                                                                        <input size="1" type="text" name="name" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Nombres" required="required" >
                                                                                                    </div>
                                                                                                    <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-message elementor-col-100">
                                                                                                        <textarea class="elementor-field-textual elementor-field  elementor-size-sm"  name="mensaje" id="form-field-message"  rows="4" placeholder="Escribe aquí tu mensaje" required="required"></textarea>
                                                                                                    </div>
                                                                                                    <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                                                                        <div style="width: 100%;display: flex">
                                                                                                            <button type="button" style="width: 50px !important;height: 50px !important;background:#5CBBAC;color:#fff;border-radius: 50% !important;display: flex !important;margin-left: auto !important;padding: unset !important" onclick="EnviarMensaje($('#form-field-name').val(),$('#form-field-message').val())">
                                                                                                                <span style="margin: auto;text-align: center;display: flex !important" class="elementor-button-icon"><i class="fab fa-whatsapp" style="font-size: 30px !important"></i></span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    @if( isset($marcas) )
                                        @if($marcas->isNotEmpty())
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-444fde9 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="444fde9" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-background-overlay"></div>
                                                <div class="">
                                                    <div class="elementor-row">
                                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-34dd2fb" data-id="34dd2fb">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="marcas_mobile" style="display: none;width:100%">
                                                                        @foreach ($marcas->chunk(1) as $chunk)
                                                                            <div style="display: flex;margin:20px auto;width:100%">
                                                                                @foreach ($chunk as $item)
                                                                                    <div class="elementor-element elementor-element-063642c" style="margin: auto;display:flex">
                                                                                        <div class="elementor-image">
                                                                                            <img style="width: 250px;margin:auto" src="<?php echo $item->img_marcas; ?>"  class="attachment-large size-large lazyload"   />
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="marcas_desktop" style="width: 100%">
                                                                        @foreach ($marcas->chunk(6) as $chunk)
                                                                            <div style="display: flex;margin:20px auto;width:100%">
                                                                                @foreach ($chunk as $item)
                                                                                    <div class="elementor-element elementor-element-063642c" style="margin: auto;display:flex">
                                                                                        <div class="elementor-image">
                                                                                            <img style="max-width: 200px;margin:auto" src="<?php echo $item->img_marcas; ?>"  class="attachment-large size-large lazyload"   />
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        @endif
                                    @endif
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

        
        

        let number = '+584121482348'
        let message_complete = `*HOME | $}* - ${$('#form-field-message').val()}`;
        let message_complete_ws = message_complete.split(" ").join("%20");
       
        function EnviarMensaje(name, message){        
            if(name && message){
                window.open(`https://api.whatsapp.com/send?phone=${number}&text=*~INFORMACIÓN~ | _${name}_* - ${message}`,'_blank');  
                $('#form-field-name').val('')
                $('#form-field-message').val('')
            }                                                                                                                                     
        }
        function formatCurrency (number) {
            return new Intl.NumberFormat('de-DE', {
                currency: 'USD',
                minimumFractionDigits: 0
            }).format(number);
        }
    </script>
@endsection
