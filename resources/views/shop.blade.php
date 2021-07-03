@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Productos - Mundo Crossfire">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mundo-crossfire.com.ve">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Productos - Mundo Crossfire">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Productos - Mundo Crossfire">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')

    <style>    
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,100);
        *, ul{
            margin: 0;
            padding: 0;
            list-style: none;}
        .btn-paginacao {
            margin-left: auto !important;
            z-index: 10;
            background-color: #FFF;}
        .btn-paginacao ul {
            width: auto;
            height: auto;}
        .btn-paginacao ul li {
            width: 30px;
            height: 30px;
            float: left;
            margin: 0 5px 0 0;
            border: 0;}
        .btn-paginacao ul li:last-child {
            margin: 0;}
        .btn-paginacao ul li label {
            width: 100%;
            height: 30px;
            float: left;
            text-align: center;
            line-height: 30px;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 1em;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color .25s ease-in-out;}
        .btn-paginacao ul li label:hover {
            background-color: #5CBBAC;
            color: #FFF;}
        .btn-paginacao-click {
            background-color: #5CBBAC !important;
            color: #FFF !important;}

            .woocommerce .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar, .woocommerce-page .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar{
                padding: 0px !important
            }
        
        @media (min-width:767px) {
            .ast-col-md-12,.ast-col-sm-12{
                width: 23% !important;
                margin: 10px !important}
        }

        .bar-mobile{
            display: none !important
        }


        @media (max-width:1200px) {
            .bar-desktop-texto{
                width: 100% !important;
            }
        }
        @media (max-width:590px) {
            #filter-html{
                width: 155px !important;
            }
            #ordenar_products{
                width: 220px !important;
            }
        }




        @media (max-width:544px) {

            #filter-html{
                width: 100% !important;
            }
            #ordenar_products{
                width: 100% !important;
            }

            .bar-desktop{
                display: none !important
            }
            .bar-mobile{
                display: inline-flex !important;
                margin: 5px auto !important
            }
            

            .btn-paginacao {
                margin: auto !important;
                z-index: 10;
                background-color: #FFF;}

            .nav02_02{
                margin: 0px !important;
                margin-right: auto!important;
                margin-left: 10px !important;
            }
            .nav02_02_02{
                padding: .75em !important;
                width: 100% !important;
            }

            .nav03_03{
                margin-bottom: 0px !important;
                width: 100% !important;
                display: inline-flex;
                margin: auto !important;
            }


            .nav01,.nav03_02{
                width: 40% !important;
                display: inline-flex !important
            }
            .nav02,.nav03_01{
                width: 60% !important;
                display: inline-flex !important
            }
            .nav01_01{
                width: 100% !important;
                margin: 0px !important;
                margin-left: auto!important;
                margin-right: 10px !important;
                padding: 0px !important
            }

            #btn-pagination-bottom{
                margin-top: -25px !important
            }
            #btn-pagination{
                margin-bottom: 10px !important
            }
        }

    </style>
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary"  class="content-area primary">
            <main id="main" class="site-main">
                <div class="ast-woocommerce-container">
                    <header class="woocommerce-products-header"></header>
                    <div class="woocommerce-notices-wrapper"></div>


                    <div id="render-control" style="width: 100% !important"></div>
                    





                    

                    
                    







                    <div id="btn-pagination" style="width:100%;display:flex"></div>
                    <ul id="products-list" style="margin-bottom: 0px !important" class="products columns-3">
                        @foreach ($productos->take(20) as $item)
                            <li class="ast-col-sm-12 ast-article-post astra-woo-hover-zoom ast-col-md-12 align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-243 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                <div class="astra-shop-thumbnail-wrap"><a href="/shop-detail/{{$item->slug }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <img style="width:100%;height:300px;object-fit: contain" alt="" src="{{$item->img_principal }}"  class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload" /></a>
                                    <a onclick="methodModal({{$item->id }})" style="cursor:pointer" class="ast-quick-view-text" style="cursor:pointer">Vista rápida</a>
                                </div>
                                <div class="astra-shop-summary-wrap"> 
                                    <span class="ast-woo-product-category">
                                        {{-- {{$item->nombre_categoria }} --}}
                                    </span>
                                    <a href="/shop-detail/{{$item->slug }}" class="ast-loop-product__link">
                                        <h2 class="woocommerce-loop-product__title">{{$item->titulo }}</h2>
                                    </a>
                                    @if($item->indicador_promocion === 1)
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-normal-{{$item->id}}"> {{$item->precio_no_afiliados}} </span>
                                                </bdi>
                                            </span>
                                        </span>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi style="color: #D94F4F !important">
                                                    Oferta <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-promocion-{{$item->id}}"> {{$item->precio_promocion}}  </span>
                                                </bdi>
                                            </span>
                                        </span>
                                    @else
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-normal-{{$item->id}}"> {{$item->precio_no_afiliados}} </span>
                                                </bdi>
                                            </span>
                                        </span>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi style="color: #5CBBAC !important">
                                               Socio <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-afiliado-{{$item->id}}"> {{$item->precio_afiliados}} </span>
                                                </bdi>
                                            </span>
                                        </span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div id="btn-pagination-bottom" style="width:100%;display:flex"></div>






                </div>
            </main>
        </div>
    </div>
@endsection
@section('js')
    <script>

        /* Variables Globales */
        let new_array = []
        let new_array_sub = []
        let box_arr = []
        let box_arr_pag = []
        let option_sort = ''
        let pagina_global = 0
        let categorias_blade = {!! $categorias !!}
        let dataUniqueSubCategory = {!! $categorias !!}.map(i => ( { id: i.id, data: [] } ))
        let productos_blade = {!! $productos !!}.reverse()
        let productos_blade_state = {!! $productos !!}.reverse()
        let productXpag = 20
        let paginacionXpag = 5

        

        /* Funciones Principales */
        arr_products_pagination(productos_blade)
        pagination_html(0)
        categoria_html()
        product_html_format_currency()
        pagination(1)
        render_control()

        let modalShowState = false
            
        $( ".astra-off-canvas-sidebar" ).click(function() {
            modalShowState = true
        });

        $('.modalClick').click(function(e){
            if(!modalShowState){
                e.stopPropagation();
            }
        });
        
        $(':not(.modalClick)').click(function(e){
            methodModalLeft(0)
            modalShowState = false
            if(modalShowState){
                e.stopPropagation();
            }
        });
            

           
       
       
      

        /*****
        ******
        **
        ** [FUNCIONES TOTALES (12)]
        **
        ** [FUNCIONES CON INICIO OBLIGATORIO]
        **  .1  - arr_products_pagination(productos_blade)  => [ Encargada de agarrar la matriz de productos y crear nueva matriz con subarrays de 16 items para la creacion de la paginacion, recibe arreglo de objetos ]
        **  .2  - pagination_html()                         => [ Encargada de crear la botonera de paginacion segun la cantida creada por el metodo arr_products_pagination() ]
        **  .3  - categoria_html()                          => [ Encargada de crear la la seccion del listado de categorias ]
        **  .4  - product_html_format_currency()            => [ Encargada de formatear el campo del dom a currency ]
        **
        **
        ** [FUNCIONES EJECUTADAS DESDE OTRA ACCION]
        **  .1  - methodModalLeft(0 o 1)                    => [ Encargada de abrir la modal lateral de filtro de categoria, 1 para abrir, 0 para cerrar ]
        **  .2  - methodModal(idProduct)                    => [ Encargada de abrir la modal para visualizar productos ]
        **  .3  - formatCurrency(number)                    => [ Encargada de preformatear a valor monetario, (separacion puntos) ]
        **  .4  - sort(obj)                                 => [ Encargada de ordenar cualquier objeto que se le pase ]
        **  .5  - sort_html(number)                         => [ Encargada de alterar el dom con el orden dado ]
        **  .6  - categoriasFilter(idCategoria)             => [ Encargada de renderizar el dom con los productos segun las categorias filtradas ]
        **  .7  - pagination(indexPagina)                   => [ Encargada de renderizar el dom con los productos segun las la pagina filtrada ]
        **  .8  - methodModalClose()                        => [ Encargada de cerrar la modal centrada ]
        **  .9  - filter_html()                             => [ Encargada de filtrar matriz con la nueva data ]
        **
        *********
        *********/

        function arr_products_pagination(params) {
            sort(params)
            let productos = params
            productos_blade = params
            let box_each = Math.ceil(productos.length/productXpag)
            box_arr = []
            box_arr_pag = []
            let index_box = 0
            for (let index = 1; index <= box_each; index++) {
                let data = []
                for (let index2 = 1; index2 <= productos.length; index2++) {
                    if(data.length < productXpag){
                        data.push(productos[index_box])
                        index_box = index_box + 1
                    }
                }
                data = data.filter(Boolean)
                box_arr.push(data)  
            } 
            if (box_arr.length >= 1) {
                box_arr.forEach((item, index )=>{
                    if(!box_arr_pag.length || box_arr_pag[box_arr_pag.length-1].length == paginacionXpag)
                    box_arr_pag.push([]);
                    box_arr_pag[box_arr_pag.length-1].push({ pagina: index + 1, datos: item});
                });
            }
        }
        function pagination_html(params) {
            box_arr = box_arr_pag[params]
            if(box_arr){
                let html = `
                <div class="btn-paginacao">
                    <ul>`;
                        if( box_arr.length >= 1 ){ html += `<li class="pags" id="pag-prev" onclick="paginationChange('p',${params})" ><label><i class="fas fa-angle-double-left"></i></label></li>`; }
                        box_arr.forEach((element) => {
                            html += `<li class="pags" id="pag-${element.pagina}" onclick="pagination(${element.pagina})" ><label>${element.pagina}</label></li>`; 
                        });
                        if( box_arr.length >= 1 ){ html += `<li class="pags" id="pag-prev" onclick="paginationChange('n',${params})" ><label><i class="fas fa-angle-double-right"></i></label></li>`; }
                    html+=`</ul>
                </div>`;
                let htmlb = `
                    <div class="btn-paginacao">
                        <ul>`;
                            if( box_arr.length >= 1 ){ htmlb += `<li class="pags" id="pag-prev" onclick="paginationChange('p',${params})" ><label><i class="fas fa-angle-double-left"></i></label></li>`; }
                            box_arr.forEach((element) => {
                                htmlb += `<li class="pags" id="pagb-${element.pagina}" onclick="pagination(${element.pagina})" ><label>${element.pagina}</label></li>`; 
                            });
                            if( box_arr.length >= 1 ){ htmlb += `<li class="pags" id="pag-prev" onclick="paginationChange('n',${params})" ><label><i class="fas fa-angle-double-right"></i></label></li>`; }
                        htmlb+=`</ul>
                    </div>`;

                $(`#btn-pagination`).empty().append(html)
                $(`#btn-pagination-bottom`).empty().append(htmlb)
            }else{
                $(`#btn-pagination`).empty().append('')
                $(`#btn-pagination-bottom`).empty().append('')
            }
        }
        function paginationChange(method,params) {
            let number = 0
            switch (method) {
                case 'p':
                    number = params - 1
                    if (number < 0) {
                        number = 0
                    }
                    break;
                case 'n':
                    number = params + 1
                    if (number > box_arr_pag.length - 1) {
                        number = box_arr_pag.length -1
                    }
                    break;
            }
            pagination_html(number)
            pagination(box_arr_pag[number][0].pagina)
        }
        function categoria_html(){
            let categorias_array = categorias_blade
            let categorias_html = ``
            categorias_html +=`
                <div class="astra-off-canvas-sidebar-wrapper from-left">  
                    <div class="modalClick togle-sidebar astra-off-canvas-sidebar">
                        <span onclick="methodModalLeft(0)" class="ast-shop-filter-close close"></span>
                        <div class="modalClick widget ast-no-widget-row">
                            <h2 style="padding:30px;padding-bottom: 15px;margin-bottom:0px" class="modalClick widget-title">Categorías</h2>
                            <button type="button" class="modalClick" onclick="limpiarFiltro()" style="margin:0px 30px;padding:10px">Limpiar filtros</button>
                            <p class="modalClick" style="padding:15px 30px 15px 30px;margin-bottom:0px;font-size:12px">Puede seleccionar uno o varios filtros a la vez</p>
                            <hr style="margin-bottom: 0px !important;" />`;
                            
                            categorias_array.forEach(element => {
                                categorias_html += `<a class="modalClick cat-one-all" style="cursor: pointer;color:#000;padding: 10px 0px 10px 0px" id='cat-one-${element.id}' >
                                <div id='cat-one-bg-${element.id}' style="display:inline-flex;width:100%" class="modalClick cat-one-bg cat-one-bg-all no-widget-text ">
                                    


                                    <div class="modalClick" style="margin:auto;padding: 0px 0px 0px 30px;width:100%;align-items: center;" onclick="categoriasFilter(${element.id},'submenus')" >${ element.nombre_categoria }</div>
                                        
                                    
                                    <div class="modalClick cat-check-all" id="cat-check-${element.id}" onclick="categoriasFilter(${element.id},'submenus')"  style="padding: 10px 0px 10px 0px;width: 50px;text-align: center;border-left: #ccc solid 1px"><i class="fas fa-chevron-right"></i></div>  




                                </div>
                            </a>
                                <hr style="margin-bottom: 0px !important;" />
                                <div style="" id="sub-${element.id}" class="modalClick sub-filters" ></div>`;
                            });
    categorias_html += `</div>
                    <div>
                </div>`;
            $('#seccion-categorias').empty().append(categorias_html)
        }
        function product_html_format_currency() {
            productos_blade.forEach(element => {
                if( $(`#format-in-html-producto-normal-${element.id}`).length > 0 ){
                    $(`#format-in-html-producto-normal-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-producto-normal-${element.id}`).text())))    
                }
                if( $(`#format-in-html-producto-afiliado-${element.id}`).length > 0 ){
                    $(`#format-in-html-producto-afiliado-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-producto-afiliado-${element.id}`).text())))    
                }
                if( $(`#format-in-html-producto-promocion-${element.id}`).length > 0 ){
                    $(`#format-in-html-producto-promocion-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-producto-promocion-${element.id}`).text())))    
                }
                if( $(`#format-in-html-product-normal-${element.id}`).length > 0 ){
                    $(`#format-in-html-product-normal-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-normal-${element.id}`).text())))    
                }
                if( $(`#format-in-html-product-afiliado-${element.id}`).length > 0 ){
                    $(`#format-in-html-product-afiliado-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-afiliado-${element.id}`).text())))    
                }
                if( $(`#format-in-html-product-promocion-${element.id}`).length > 0 ){
                    $(`#format-in-html-product-promocion-${element.id}`).text(formatCurrency(JSON.parse($(`#format-in-html-product-promocion-${element.id}`).text())))    
                }
            });
        }
        function methodModalLeft(params) {
            switch (params) {
                case 1:
                    $('.astra-off-canvas-sidebar-wrapper').css('opacity', '1').css('visibility', 'visible')
                    $('.woocommerce .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar, .woocommerce-page .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar').css('left', 0)
                break;
                case 0:
                    $('.astra-off-canvas-sidebar-wrapper').css('opacity', '0').css('visibility', 'hidden')
                    $('.woocommerce .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar, .woocommerce-page .astra-off-canvas-sidebar-wrapper .astra-off-canvas-sidebar').css('right', '0')
                break;
            }
        }
        function methodModal(id) {
            localStorage.removeItem('current_product');
            req = productos_blade.find(i => i.id === id)
            localStorage.setItem("current_product", JSON.stringify( req ))

            let precio_html = `<span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-normal-${req.id}"> ${formatCurrency(JSON.parse(req.precio_no_afiliados))} </span>
                        </bdi>
                    </span>
                </span>
                <br />`;
            if(req.indicador_promocion === 1){
                precio_html += `
                
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi style="color: #D94F4F !important">
                            Oferta <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-promocion-${req.id}"> ${formatCurrency(JSON.parse(req.precio_promocion))} </span>
                        </bdi>
                    </span>
                </span>`;
            }else{
                precio_html += `
                
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <bdi style="color: #5CBBAC !important">
                            Socio <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-producto-afiliado-${req.id}"> ${formatCurrency(JSON.parse(req.precio_afiliados))} </span>
                        </bdi>
                    </span>
                </span>`;
            }
            $('#current_product_price').empty().append(precio_html)
            $('#current_product_img').attr('src', req.img_principal);
            $('#current_product_title').text(req.titulo)
            $('#current_product_category').text(req.nombre_categoria)
            $('#current_product_description').text(req.descripcion)
            $('.ast-quick-view-bg').addClass('ast-quick-view-bg-ready')
            $('#ast-quick-view-modal').addClass('open stick-add-to-cart')
        }
        function sort(obj){
            switch (option_sort) {
                case 'mayor':
                    obj.sort(function (a, b) {
                        if (a.precio_no_afiliados < b.precio_no_afiliados) {
                            return 1;
                        }
                        if (a.precio_no_afiliados > b.precio_no_afiliados) {
                            return -1;
                        }
                        return 0;
                    });
                    break;
                case 'menor':
                    obj.sort(function (a, b) {
                        if (a.precio_no_afiliados > b.precio_no_afiliados) {
                            return 1;
                        }
                        if (a.precio_no_afiliados < b.precio_no_afiliados) {
                            return -1;
                        }
                        return 0;
                    });
                    break;
                default:
                    obj.sort(function (a, b) {
                        return 0;
                    });
                    break;
            }
        }
        function sort_html(){
            if( $('#ordenar_products').val() === 'mayor' ){
                option_sort = 'mayor'
            }
            if( $('#ordenar_products').val() === 'menor' ){
                option_sort = 'menor'
            }
            arr_products_pagination(productos_blade)
            pagination_html(0)
            pagination(1)
        }
        function formatCurrency(number) {
            return new Intl.NumberFormat('de-DE', {
                currency: 'USD',
                minimumFractionDigits: 0
            }).format(number);
        }

        function categoriasSubFilter(params,cat) {
            if(params === 'limpiar'){
                limpiarFiltro()
            }else{
                $(`.cat-sub-check-children`).empty().append()
                let obj = (dataUniqueSubCategory.find(i => i.id === cat )) ? dataUniqueSubCategory.find(i => i.id === cat ) : []

                if(obj){
                    if(obj.data.find(i => i === params )){
                        obj.data = []
                    }else{
                        obj.data = []
                        obj.data.push(params)
                    }
                }

                new_array_sub = dataUniqueSubCategory.map(i => i.data )
                new_array_sub = [].concat.apply([], new_array_sub)

                new_array_sub.forEach(element => {
                    $(`#cat-sub-check-${element}`).empty().append('<i class="fas fa-check-circle"></i>').css('color','#5cbbac')
                });

                if(new_array_sub.length === 0 ){
                    limpiarFiltro()
                }

                let payload =  {subcategory: new_array_sub }
                $.ajax({
                    type: "post",
                    url: "/api/get/product/subcategory",
                    data: payload,
                    success: function (data) {
                        console.log("data_sub_id_send", payload )
                        console.log("data_sub_back", data.productos )
                        let categorias_sub_array = data.productos
                        arr_products_pagination(categorias_sub_array)
                        pagination_html(0)
                        pagination(1)
                    },
                });
            }
        }



        function categoriasFilter(params,type) {
            let categorias_array = categorias_blade
            let isOneCategory = new_array.find( i => i === params ) 
            let index = new_array.findIndex( i => i === params ) 

            if(type === 'normal'){
                if($(`#cat-check-${params}`).hasClass("active")){
                    new_array.splice(index,1)
                    $(`#sub-${params}`).empty().append('')
                    $(`#cat-one-${params}`).css('font-weight','normal')
                    $(`#cat-one-bg-${params}`).css('background','#fff')
                    $(`#cat-check-${params}`).removeClass('active')
                }else{
                    if(isOneCategory){
                        new_array.splice(index,1)
                        $(`#sub-${params}`).empty().append('')
                        $(`#cat-one-${params}`).css('font-weight','normal')
                        $(`#cat-one-bg-${params}`).css('background','#fff')
                    }else{
                        new_array.push(params)
                        $(`#cat-one-${params}`).css('font-weight','bold')
                        $(`#cat-one-bg-${params}`).css('background','#0000000A')
                    }
                }
                $(`#cat-check-${params}`).empty().append('<i style="color:#000" class="fas fa-chevron-right"></i>').css('background','#fff')
                let payload =  {categorias: new_array }
                $.ajax({
                    type: "post",
                    url: "/api/get/product/category",
                    data: payload,
                    success: function (data) {
                        let categorias_array = data.productos
                        arr_products_pagination(categorias_array)
                        pagination_html(0)
                        pagination(1)
                    },
                });
            }

            


            if(type === 'submenus'){
                if($(`#cat-check-${params}`).hasClass('active')){
                    $(`#cat-check-${params}`).removeClass('active')

                    $(`#cat-one-${params}`).css('font-weight','normal')
                    $(`#cat-one-bg-${params}`).css('background','#fff')
                }else{
                    $(`#cat-check-${params}`).addClass('active')
                    $(`#cat-one-${params}`).css('font-weight','bold')
                    $(`#cat-one-bg-${params}`).css('background','#0000000A')
                    
                }
                if($(`#cat-check-${params}`).hasClass("active")){
                    if(isOneCategory){
                        $(`#cat-check-${params}`).empty().append('<i style="color:#fff" class="fas fa-chevron-down"></i>').css('background','#5cbbac')
                        $.ajax({
                            type: "get",
                            url: `/api/enviarSubcategoryPorCategoria`,
                            data: {category: [params] },
                            success: function (data) {
                                let sub = ``
                                data[0].forEach(element => {
                                    sub +=  `<div onclick="categoriasSubFilter(${element.id},${params})" style="display:inline-flex;margin-bottom:0px !important;padding: 0px 0px 0px 30px;width:100%"  class="modalClick no-widget-text">
                                                <div id="cat-sub-check-${element.id}"  class="cat-sub-check-children cat-sub-check-children-${params} modalClick cat-sub-check-all" style=";width:30px;margin: auto auto auto 0;"> </div>
                                                <a style="cursor: pointer;color:#000;padding: 10px 0px 10px 0px;width: 100%;"       >
                                                    ${element.nombre_subcategoria}
                                                </a>
                                            </div><hr style="margin-bottom: 0px !important;" />`;
                                });
                                $(`#sub-${params}`).empty().append(sub)
                            },
                        });
                    }else{
                        $(`#cat-check-${params}`).empty().append('<i style="color:#fff" class="fas fa-chevron-down"></i>').css('background','#5cbbac')
                        $.ajax({
                            type: "get",
                            url: `/api/enviarSubcategoryPorCategoria`,
                            data: {category: [params] },
                            success: function (data) {
                                let sub = ``
                                data[0].forEach(element => {
                                    sub +=  `<div onclick="categoriasSubFilter(${element.id},${params})" style="display:inline-flex;margin-bottom:0px !important;padding: 0px 0px 0px 30px;width:100%"  class="modalClick no-widget-text">
                                                <div id="cat-sub-check-${element.id}"  class="cat-sub-check-children cat-sub-check-children-${params} modalClick cat-sub-check-all" style=";width:30px;margin: auto auto auto 0;"> </div>
                                                <a style="cursor: pointer;color:#000;padding: 10px 0px 10px 0px;width: 100%;"       >
                                                    ${element.nombre_subcategoria}
                                                </a>
                                            </div><hr style="margin-bottom: 0px !important;" />`;
                                });
                                $(`#sub-${params}`).empty().append(sub)
                            },
                        });
                    }
                }else{
                    $(`#sub-${params}`).empty().append('')
                    $(`#cat-check-${params}`).empty().append('<i style="color:#000" class="fas fa-chevron-right"></i>').css('background','#fff')       
                }
            }






        }









        function limpiarFiltro() {
            dataUniqueSubCategory = {!! $categorias !!}.map(i => ( { id: i.id, data: [] } ))
            new_array = []
            new_array_sub = []
            
            arr_products_pagination(productos_blade_state)
            pagination_html(0)
            pagination(1)
            

            $(`.cat-one-all`).css('font-weight','normal')
            $(`.cat-one-bg-all`).css('background','#fff')
            $(`.cat-check-all`).empty().append('<i style="color:#000" class="fas fa-chevron-right"></i>').css('background','#fff')
            $(`.cat-sub-check-all`).css('display','none')
            $('.sub-filters').empty().append('')
            $('.cat-check-all').removeClass('active')
            $(`.cat-sub-check-children`).empty().append()




        }
        function pagination(params) {
            pagina_global = params
            let arr_box_data =  box_arr ? box_arr.find( ( i) => i.pagina === params ).datos : []
            

            $(`.pags`).removeClass("btn-paginacao-click")
            if($(`#pag-${params}`).is(".btn-paginacao-click") || $(`#pagb-${params}`).is(".btn-paginacao-click")){
                $(`#pag-${params}`).removeClass("btn-paginacao-click")
                $(`#pagb-${params}`).removeClass("btn-paginacao-click")
            }else{
                $(`#pag-${params}`).addClass("btn-paginacao-click")
                $(`#pagb-${params}`).addClass("btn-paginacao-click")
            }
            let categorias_html = ``
            if(arr_box_data.length === 0){
                let text = `
                <li class="ast-col-sm-12 ast-article-post astra-woo-hover-zoom ast-col-md-12 align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-243 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                    <div class="astra-shop-thumbnail-wrap"><a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                        <img style="width:100%;height:300px;object-fit: contain" alt="" src="" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload" /></a>
                        <a href="#" style="cursor:pointer" class="ast-quick-view-text" style="cursor:pointer">Vista no Disponible</a>
                    </div>
                    <div class="astra-shop-summary-wrap"> 
                        <a href="#" class="ast-loop-product__link">
                            <h2 class="woocommerce-loop-product__title">Sin Resultados</h2>
                        </a>
                    </div>
                </li>`;
                $('#products-list').empty().append(text)
                $('#contador-products-list').text(`Sin Resultados de productos`)
            }else{
                arr_box_data.forEach(element => {
                                   
                            categorias_html += `
                                <li class="ast-col-sm-12 ast-article-post astra-woo-hover-zoom ast-col-md-12 align-center box-shadow-1 box-shadow-3-hover ast-product-gallery-layout-horizontal ast-product-gallery-with-no-image ast-product-tabs-layout-horizontal ast-qv-on-image product type-product post-243 status-publish first instock product_cat-alimentos-para-mascotas has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                                    <div class="astra-shop-thumbnail-wrap"><a href="/shop-detail/${element.slug }" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">

                                        
                                        <img style="width:100%;height:300px;object-fit: contain" alt="" src="${element.img_principal}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload" /></a>
                                        
                                        <a onclick="methodModal(${element.id})" style="cursor:pointer" class="ast-quick-view-text" style="cursor:pointer">Vista rápida</a>
                                    </div>
                                    <div class="astra-shop-summary-wrap"> 

                                        <span class="ast-woo-product-category">`;
                                            
                                            if(!element.nombre_categoria){
                                                categorias_blade.forEach(element_cat => {
                                                    if(element.id == element_cat.id){
                                                        categorias_html += `${element_cat.nombre_categoria} `;
                                                    }
                                                });
                                            }else{
                                                categorias_html += `${element.nombre_categoria} `;
                                            }
                                            
                                            categorias_html +=  `</span>
                                        <a href="/shop-detail/${element.slug }" class="ast-loop-product__link">
                                            <h2 class="woocommerce-loop-product__title">${element.titulo}</h2>
                                        </a>`;

                                        if (element.indicador_promocion === 1){
                                            categorias_html += `
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                    Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-normal-${element.id}"> ${ formatCurrency(JSON.parse(element.precio_no_afiliados)) } </span>
                                                    </bdi>
                                                </span>
                                            </span>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi style="color: #D94F4F !important">
                                                        Oferta <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-promocion-${element.id}"> ${ formatCurrency(JSON.parse(element.precio_promocion)) } </span>
                                                    </bdi>
                                                </span>
                                            </span>`;
                                        }else{
                                            categorias_html += 
                                            `<span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        Normal <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-normal-${element.id}"> ${ formatCurrency(JSON.parse(element.precio_no_afiliados)) } </span>
                                                    </bdi>
                                                </span>
                                            </span>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi style="color: #5CBBAC !important">
                                                    Socio <span class="woocommerce-Price-currencySymbol">&#36; </span> <span id="format-in-html-product-afiliado-${element.id}"> ${ formatCurrency(JSON.parse(element.precio_afiliados)) } </span>
                                                    </bdi>
                                                </span>
                                            </span>`;
                                        }
                                        categorias_html += `
                                    </div>
                                </li>
                                `;
                        });
                        $('#products-list').empty().append(categorias_html)
                        $('#contador-products-list').text(`Mostrando todos los resultados ${arr_box_data.length} de ${productos_blade.length} productos`)
        
            }
        }
        function methodModalClose () {
            $('#load').hide()
            $('.ast-quick-view-bg').removeClass('ast-quick-view-bg-ready')
            $('#ast-quick-view-modal').removeClass('open stick-add-to-cart')
        }
        function filter_html(event) {
            event.preventDefault();
            let data = []
            let filter = $('#filter-html').val()
            productos_blade_state = productos_blade
            productos_blade.forEach(element => {
              if(filter){
                if((element.titulo.toLowerCase()).includes(filter.toLowerCase())){
                    data.push(element)
                }
              }else{
                data = productos_blade_state
              }
            });
            arr_products_pagination(data)
            pagination_html(0)
            product_html_format_currency()
            pagination(1)
            productos_blade = productos_blade_state
        }

        function render_control() {
            let control_mobile = `
                                <div class="bar-mobile" style="width: 100% !important">
                                    <div class="nav01">
                                        <button style="margin-bottom: 5px;width:100% !important" onclick="methodModalLeft(1)" class="modalClick nav01_01 button astra-shop-filter-button">
                                            <span class="modalClick astra-woo-filter-icon"></span>
                                            <span class="astra-woo-filter-text">Filtros</span>
                                        </button>
                                    </div>
                                    <div class="nav02">
                                        <form style="margin-bottom: 5px;float:left;width:100% !important" class="nav02_02 woocommerce-ordering" method="get">
                                            <select onchange="sort_html()" id="ordenar_products" name="orderby" class="nav02_02_02 orderby" aria-label="Pedido de la tienda">
                                                <option value="">Ordenar por precio: Default</option>
                                                <option value="menor">Ordenar por precio: bajo a alto</option>
                                                <option value="mayor">Ordenar por precio: alto a bajo</option>
                                            </select>
                                            <input type="hidden" name="paged" value="1" />
                                        </form>
                                    </div>
                                </div>
                                <div  class="bar-mobile" style="width: 100% !important">
                                    <form style="margin-bottom: 5px;float:right" class="nav03_03 woocommerce-ordering" method="get">
                                        <input class="nav03_01" type="text" name="paged" value="" id="filter-html" style="vertical-align: top;padding: .5em;margin-right:10px" />
                                        <button class="nav03_02" onclick="filter_html(event)" class="" >
                                            <span style="width: 100% !important" class="astra-woo-filter-text">Buscar</span>
                                        </button>
                                    </form>
                                </div>
                                <div  class="bar-mobile" style="width: 100% !important">
                                    <div id="contador-products-list" style="margin-bottom: 0px !important;text-align:center !important;width:100% !important" class="woocommerce-result-count">Mostrando todos los resultados {{ count($productos->take(20)) }} de {{$contador}}</div>
                                </div>`;
            let control_desktop = ` <button style="margin-bottom: 5px" onclick="methodModalLeft(1)" class="modalClick bar-desktop button astra-shop-filter-button">
                                        <span class="modalClick astra-woo-filter-icon"></span>
                                        <span class="astra-woo-filter-text">Filtros</span>
                                    </button>
                                    <p id="contador-products-list" style="margin-right: 30px" class="bar-desktop bar-desktop-texto woocommerce-result-count">Mostrando todos los resultados {{ count($productos->take(20)) }} de {{$contador}}</p>
                                    <form style="margin-bottom: 5px;float:left" class="bar-desktop woocommerce-ordering" method="get">
                                        <select onchange="sort_html()" id="ordenar_products" name="orderby" class="orderby" aria-label="Pedido de la tienda">
                                            <option value="">Ordenar por precio: Default</option>
                                            <option value="menor">Ordenar por precio: bajo a alto</option>
                                            <option value="mayor">Ordenar por precio: alto a bajo</option>
                                        </select>
                                        <input type="hidden" name="paged" value="1" />
                                    </form>
                                    <form style="margin-bottom: 5px;float:right" class="bar-desktop woocommerce-ordering" method="get">
                                        <input type="text" name="paged" value="" id="filter-html" style="vertical-align: top;padding: .5em;margin-right:10px" />
                                        <button onclick="filter_html(event)" >
                                            <span class="astra-woo-filter-text">Buscar</span>
                                        </button>
                                    </form>`;
            if (window.screen.width <= 544) {
                $('#render-control').empty().append(control_mobile)
            }else{
                $('#render-control').empty().append(control_desktop)
            }
        }

    </script>
@endsection