@extends('app')
@section('css')
<style>

    .style-table-total{
        width: 100% !important;
        text-align: right !important;
        margin-left: auto !important;
    }

    .color-green{
        color: #5CBBAC !important;
    }
    
    @media (min-width:767px) {
      
        .style-table-total{
            width: 50% !important;
            text-align: right !important;
            margin-left: auto !important;
        }
    }
    input,select{
            background-color: #F5F5F5 !important;
            border-width: 0px 0px 0px 0px !important;
        }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div class="ast-container">


        <div id="primary" class="content-area primary">


            <main id="main" class="site-main">
                <article class="post-4427 page type-page status-publish ast-article-single" id="post-4427"
                    itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header ast-header-without-markup">

                    </header><!-- .entry-header -->

                    <div class="entry-content clear" itemprop="text">


                        <div class="elementor elementor-4427">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">
                                    <section
                                        class="elementor-section elementor-top-section elementor-element elementor-element-a584ef8 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="a584ef8" data-element_type="section">
                                        <form class="elementor-form"  name="form_pay_wapay" id="form_pay_wapay" action="">
                                        <input type="hidden" name="token_ws" value="" id="token_ws">
                                        
                                        <div ></div>


                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b7bcb4e"
                                                    data-id="b7bcb4e" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-row">
                                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b6899d4"
                                                                data-id="b6899d4" data-element_type="column">
                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                    <div class="elementor-widget-wrap">
                                                                        <div class="elementor-element elementor-element-b093c68 elementor-widget elementor-widget-heading"
                                                                            data-id="b093c68" data-element_type="widget"
                                                                            data-widget_type="heading.default">
                                                                            <div class="elementor-widget-container">
                                                                                <h4 style="color:#5CBBAC"
                                                                                    class="elementor-heading-title elementor-size-default">
                                                                                    Último paso</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-e3e205c elementor-widget elementor-widget-text-editor"
                                                                            data-id="e3e205c" data-element_type="widget"
                                                                            data-widget_type="text-editor.default">
                                                                            <div class="elementor-widget-container">
                                                                                <div class="elementor-text-editor elementor-clearfix">
                                                                                    <p style="margin-bottom:0px !important">Datos de envio</p>
                                                                                    {{-- <p style="color: #D94F4F;">(*) Obligatorio</p> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-43360ebe elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="43360ebe">
                                                                            <div class="elementor-container elementor-column-gap-default">
                                                                                <div class="elementor-row">
                                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-e1448d2" data-id="e1448d2">
                                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                                            <div class="elementor-widget-wrap">
                                                                                                <div class="elementor-element elementor-element-58a0b0a elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="58a0b0a" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}" data-widget_type="form.default">
                                                                                                    <div class="elementor-widget-container">
                                                                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">




                                                                                                                {{-- <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="name" class="float-left" >Nombres y Apellidos <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="text" style="border: none;border-radius: 0px;border-bottom:1px solid #ff724f;" id="name" name="name" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                    <div style="color: #ff724f">Error al ingresar el numero de cedula</div>
                                                                                                                </div> --}}


                                                                                                            
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="name" class="float-left" >Nombres y Apellidos <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="text" style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="name" name="name" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="email" class="float-left" >Correo Electronico <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="email"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="email" name="email" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="cemail" class="float-left" >Confirmar correo Electronico <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="email"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" onchange="validEmail()" id="vemail" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="number" class="float-left" >Número de teléfono <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="number"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="phone" name="phone"  class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="reg" class="float-left" >Región <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <p style="width: 100%;margin-bottom:0px;text-align:left;font-size:10px">Si está en otra comuna o region escríbanos a WhatsApp por favor</p>
                                                                                                                    <input disabled size="1" type="text"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="region" name="region" value="Región Metropolitana" placeholder="- Región Metropolitana -" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="com" class="float-left" >Comuna <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <select name="comuna" id="comuna"  style="width: 100%;border: none;border-radius: 0px;border-bottom:1px solid #000">
                                                                                                                        <option value="" >Seleccione una comuna</option>
                                                                                                                        <option value="Cerrillos" >Cerrillos</option>
                                                                                                                        <option value="El Bosque" >El Bosque</option>
                                                                                                                        <option value="La Cisterna" >La Cisterna</option>
                                                                                                                        <option value="La Florida" >La Florida</option>
                                                                                                                        <option value="La Granja" >La Granja</option>
                                                                                                                        <option value="La Pintana" >La Pintana</option>
                                                                                                                        <option value="La Reina" >La Reina</option>
                                                                                                                        <option value="Las Condes" >Las Condes</option>
                                                                                                                        <option value="Lo Espejo" >Lo Espejo</option>
                                                                                                                        <option value="Maipú" >Maipú</option>
                                                                                                                        <option value="Macul" >Macul</option>
                                                                                                                        <option value="Ñuñoa" >Ñuñoa</option>
                                                                                                                        <option value="Pedro Aguirre Ceda" >Pedro Aguirre Ceda</option>
                                                                                                                        <option value="Peñalolén" >Peñalolén</option>
                                                                                                                        <option value="Puente Alto" >Puente Alto</option>
                                                                                                                        <option value="Providencia" >Providencia</option>
                                                                                                                        <option value="San Bernardo" >San Bernardo</option>
                                                                                                                        <option value="San Joaquín" >San Joaquín</option>
                                                                                                                        <option value="San Miguel" >San Miguel</option>
                                                                                                                        <option value="Santiago" >Santiago</option>
                                                                                                                        <option value="Vitacura" >Vitacura</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="calle" class="float-left" >Calle o avenida <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="text"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="calle_avenida" name="calle_avenida" class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>



                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="number" class="float-left" >Número <i style="font-size: 15px;font-weight: bold;color: #D94F4F;" >*</i></label>
                                                                                                                    <input  size="1" type="number"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="numero" name="numero"  class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>

                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="number" class="float-left" >N° Depto / Casa</label>
                                                                                                                    <input  size="1" type="text"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="nrocasa" name="nrocasa"  class="elementor-field elementor-size-sm  elementor-field-textual">
                                                                                                                </div>
                                                                                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100" style="margin-bottom:15px">
                                                                                                                    <label for="number" class="float-left" >Referencia</label>
                                                                                                                    <input  size="1" type="text"  style="border: none;border-radius: 0px;border-bottom:1px solid #000" id="referencia" name="referencia"  class="elementor-field elementor-size-sm  elementor-field-textual">
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
                                                                        <div style="margin: 20px auto" class="elementor-element elementor-element-e3e205c elementor-widget elementor-widget-text-editor" data-id="e3e205c" data-element_type="widget" data-widget_type="text-editor.default">
                                                                            <div class="elementor-widget-container">
                                                                                <div  class="elementor-text-editor elementor-clearfix">
                                                                                    <p id="total-suscribe-form" ></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        

                                                                        <div class="elementor-element elementor-element-6eab4b7 elementor-align-center elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button"
                                                                            data-id="6eab4b7" data-element_type="widget"
                                                                            data-widget_type="button.default">
                                                                            <div class="elementor-widget-container">
                                                                                <div class="elementor-button-wrapper">
                                                                                    {{-- {{csrf_field()}}  --}}
                                                                                            
                                                                                        <a class="checkout-button button alt wc-forward" style="cursor:pointer" id="confirm-pay" onclick="alertValid()">
                                                                                            Continuar
                                                                                        </a>

                                                                                        <div class="lds-ellipsis" id="load"><div></div><div></div><div></div><div></div></div>
                                                                                        <button type="submit" class="checkout-button button alt wc-forward" id="finish-pay">Pagar
                                                                                        </button>
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
                                        </div>
                                    </form>
                                    </section>
                                    
                                  
                                </div>
                            </div>
                        </div>



                    </div><!-- .entry-content .clear -->



                </article><!-- #post-## -->

            </main><!-- #main -->


        </div><!-- #primary -->


    </div> <!-- ast-container -->
@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/polyfill.min.js')}}"></script>
<script>
        $(document).ready(function() {
            $('#finish-pay').hide()
            $('#load').hide()
        });
</script>
<script>

    let arr_cart_productss = (JSON.parse(localStorage.getItem("arr_cart_products"))) ? JSON.parse(localStorage.getItem("arr_cart_products")) : []
    let total = JSON.parse(localStorage.getItem("total_price_product"))
    let despacho = (JSON.parse(localStorage.getItem("despacho"))) ? JSON.parse(localStorage.getItem("despacho")) : 0
    let payload = {}
    $('#total-suscribe-form').empty().append(`Total $ ${formatCurrency(JSON.parse(total))}`)
    function formatCurrency (number) {
        return new Intl.NumberFormat('de-DE', {
            currency: 'USD',
            minimumFractionDigits: 0
        }).format(number);
    }
    function modalCloseHistory() {
        $('#load').hide()
        $('.ast-quick-view-bg').removeClass('ast-quick-view-bg-ready')
        $('#ast-quick-view-modal').removeClass('open stick-add-to-cart')
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
                                                                                        <th colspan="4" style="border-bottom: none;text-align: center" style="text-align: center" class="product-thumbnail"> Datos Personales</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Nombres y Apellidos</th>
                                                                                        <th scope="col">Email</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td data-title="Nombres y Apellidos"  > ${params.name}</td>
                                                                                        <td data-title="Email" >  ${params.email}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table class=" woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th colspan="4" style="border-bottom: none;text-align: center" style="text-align: center" class="product-thumbnail"> Ubicacion</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Región</th>
                                                                                        <th scope="col">Comuna</th>
                                                                                        <th scope="col">Calle o avenida</th>
                                                                                        <th scope="col">Número de teléfono</th>
                                                                                        <th scope="col">N° Depto / Casa</th>
                                                                                        <th scope="col">Número</th>
                                                                                        <th scope="col">Referencia</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                                        <td data-title="Región"  > ${params.region} </td>
                                                                                        <td data-title="Comuna" > ${params.comuna} </td>
                                                                                        <td data-title="Calle o avenida" > ${params.calle_avenida} </td>
                                                                                        <td data-title="Número de teléfono"  > ${params.phone} </td>
                                                                                        <td data-title="N° Depto / Casa" > ${params.nrocasa} </td>
                                                                                        <td data-title="Número" > ${params.numero} </td>
                                                                                        <td data-title="Referencia" > ${params.referencia} </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
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
                                                                            </table>
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
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
                                                                            </table>

                                                                            
                                                                            <table  class="shop_table shop_table_responsive cart woocommerce-cart-form__contents style-table-total" cellspacing="0">
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

                                                                            <div style="margin:20px" class="elementor-element elementor-element-6eab4b7 elementor-align-center elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="6eab4b7" data-element_type="widget" data-widget_type="button.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="elementor-button-wrapper" style="text-align:right">
                                                                                        <a class="checkout-button button alt wc-forward" onclick="modalCloseHistory()"> Regresar </a>
                                                                                        <a class="checkout-button button alt wc-forward" onclick="pagar()"> Confirmar </a>
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

    function validEmail() {
        if($('#email').val() !== $('#vemail').val() ){
            Swal.fire({
                title: "Alerta!",
                text: "Los correos no coinciden!",
                type: "info",
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
            $('#vemail').val('')
        }
    }
    function pagar(params) {
        
        $('#confirm-pay').hide()
        
        modalCloseHistory()
        $('#load').show()
        $.ajax({
            type: "POST",
            url: "/payment-pay-invite",
            data:{
                "_token": "{{ csrf_token() }}",
                "payload":payload
            },
            success: function (data) {
                $('#token_ws').val(data.response.token);
                $('#form_pay_wapay').attr("action", data.response.url);
                $('#load').hide()
                $('#finish-pay').show()
                localStorage.clear("total_price_product")
            },
            error: function (data) {
                $('#load').hide()
                $('#confirm-pay').show()
                modalCloseHistory()
                Swal.fire({
                    title: "Alerta!",
                    text: "Intente mas tarde",
                    type: "info",
                    timer: 3000,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });
    }
    function alertValid() {
        //$('#confirm-pay').hide()
        $('#load').show()
        payload = {}
        let validator = false
        payload = {
            _token: "{{ csrf_token() }}",
            name: $('#name').val(),
            email: $('#email').val(),
            region: $('#region').val(),
            comuna: $('#comuna').val(),
            calle_avenida: $('#calle_avenida').val(),
            numero: $('#numero').val(),
            phone: $('#phone').val(),
            nrocasa: $('#nrocasa').val(),
            referencia: $('#referencia').val(),
            arr_cart_productss: arr_cart_productss,
            despacho: despacho,
            total:total + despacho
        }
        validator = ( payload.name === '' ||  
            payload.email === '' || 
            payload.region === '' || 
            payload.comuna === '' || 
            payload.calle_avenida === '' || 
            payload.numero === '' || 
            payload.phone === '' ) ? false : true
         
        if(validator){
            modalConfirm(payload)
        }else{
            $('#load').hide()
            $('#confirm-pay').show()
                if(payload.name === ''){
                    $('#name').prop("required", true)
                    $("#name").attr("placeholder", "Escribe aqui tu nombre y apellido").val("").focus().blur();
                    $("#name").css("border-color", "red")
                }else{ $("#name").css("border-color", "black")  }

                if(payload.email === ''){
                    $('#email').prop("required", true)
                    $("#email").attr("placeholder", "ejemplo@tucorreo.com").val("").focus().blur();
                    $("#email").css("border-color", "red")
                }else{ $("#email").css("border-color", "black")  }

                if(payload.comuna === ""){
                    $('#comuna').prop("required", true)
                    $("#comuna").focus().val("").blur();
                    $("#comuna").css("border-color", "red")
                }else{ $("#comuna").css("border-color", "black")  }

                if(payload.calle_avenida === ''){
                    $('#calle_avenida').prop("required", true)
                    $("#calle_avenida").attr("placeholder", "Ingrese una calle o avenida").val("").focus().blur();
                    $("#calle_avenida").css("border-color", "red")
                }else{ $("#calle_avenida").css("border-color", "black")  }

                if(payload.numero === ''){
                    $('#numero').prop("required", true)
                    $("#numero").attr("placeholder", "Ingrese un numero").val("").focus().blur();
                    $("#numero").css("border-color", "red")
                }else{ $("#numero").css("border-color", "black")  }

                if(payload.phone === ''){
                    $('#phone').prop("required", true)
                    $("#phone").attr("placeholder", "Solo ingresar numeros").val("").focus().blur();
                    $("#phone").css("border-color", "red")
                }else{ $("#phone").css("border-color", "black")  }
            /* Swal.fire({
                title: "Alerta!",
                text: "Hay algunos campos vacios!",
                type: "info",
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            }); */
        }
    }
</script>


@endsection
