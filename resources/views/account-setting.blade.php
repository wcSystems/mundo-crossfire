@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Configuracion de Cuenta - Mundo Crossfire">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mundo-crossfire.com.ve">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Configuracion de Cuenta - Mundo Crossfire">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Configuracion de Cuenta - Mundo Crossfire">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
<style>
    @media (min-width:767px) {
        .padding-bottom {
            padding-top: 100px !important;
            padding-bottom: 0px !important
        }
        .padding-top {
            padding-bottom: 100px !important;
            padding-top: 0px !important
        }
        .padding-middle {
            padding: 0px 100px !important
        }
    }
    @media (max-width:544px) {
        .padding-bottom {
            padding-top: 1.5em !important;
            padding-bottom: 0em !important
        }
        .padding-top {
            padding-bottom: 1.5em !important;
            padding-top: 0em !important
        }
        .padding-middle {
            padding: 0em 1em !important
        }
    }
</style>
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-97 page type-page status-publish ast-article-single padding-bottom">
                    <header class="entry-header ast-no-thumbnail ast-no-meta">
                        <h1 class="entry-title" itemprop="headline">Mi Cuenta</h1>	
                    </header>
	                <div class="entry-content clear" itemprop="text">    
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-cart-form"  >
                                <table class=" woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="4" style="border-bottom: none;text-align: center" class="product-thumbnail">Hemos reciclado juntos</th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" style="margin-bottom:0px" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center" class="product-thumbnail">Papel y Cartón</th>
                                            <th style="text-align: center" class="product-subtotal">Vidrio</th>
                                            <th style="text-align: center" class="product-subtotal">Plásticos</th>
                                            <th style="text-align: center" class="product-subtotal">Latas y PET</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($reciclaje as $recicla)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td style="text-align: center" class="product-price" data-title="Papel y Cartón">
                                                    <span class="woocommerce-Price-amount amount"> @if ($recicla->azul) {{$recicla->azul}} @else 0 @endif  KG</span>						
                                                </td>
                                                <td style="text-align: center" class="product-price" data-title="Vidrio">
                                                    <span class="woocommerce-Price-amount amount"> @if ($recicla->verde) {{$recicla->verde}} @else 0 @endif  KG</span>	
                                                </td>
                                                <td style="text-align: center" class="product-price" data-title="Plásticos">
                                                    <span class="woocommerce-Price-amount amount"> @if ($recicla->amarillo) {{$recicla->amarillo}} @else 0 @endif  KG</span>
                                                </td>
                                                <td style="text-align: center" class="product-price" data-title="Latas y PET">
                                                    <span class="woocommerce-Price-amount amount"> @if ($recicla->rojo) {{$recicla->rojo}} @else 0 @endif  KG</span>	
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>        
                    </div>        
                </article>
                

                <article class="post-99 page type-page status-publish ast-article-single padding-top" style="padding-bottom: 0px !important" >
                    
                    <div class="entry-content clear" itemprop="text">
                        
                        <div class="woocommerce">
                            <header class="entry-header ast-no-thumbnail ast-no-meta" style="margin-top: 30px">
                                <h1 class="entry-title" itemprop="headline">Mi informacion Personal</h1>	
                            </header>
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-form woocommerce-form-login login" name="formPersonal" id="formPersonal">
                                @csrf
                                    @foreach($reciclaje as $recicla)
                                        <input type="hidden" name="user_id" value="{{$recicla->id}}">
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="name">Nombre y Apellido</label>
                                            <input name="name" id="name" type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                                value="{{$recicla->name}}" />
                                        </p>
                                    @endforeach

                                    @forelse($informacion as $info)
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Fecha de nacimiento</label>
                                            <input name="fecha_nacimiento" id="fecha_nacimiento" value="{{$info->fecha_nacimiento}}" class="woocommerce-Input woocommerce-Input--text input-text" type="date" style=" color: #666;  padding: .75em;  height: auto; border-width: 1px; border-style: solid; border-radius: 2px; box-shadow: none; box-sizing: border-box; transition: all .2s linear;"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Region</label>
                                            <input name="region" id="region" value="{{$info->region}}" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Comuna</label>
                                            <input name="comuna" id="comuna" value="{{$info->comuna}}" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Calle</label>
                                            <input name="calle_avenida" id="calle_avenida" value="{{$info->calle_avenida}}" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Numero</label>
                                            <input name="numero" id="numero" value="{{$info->numero}}" style="max-width: 100% !important" class="woocommerce-Input woocommerce-Input--text input-text"  type="number"
                                                />
                                        </p>
                                        <p class="form-row">
                                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                                value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                                value="/wordpress/my-account/" /> 
                                                <button type="submit"
                                                class="woocommerce-button button woocommerce-form-login__submit" name="btnPersonal" id="btnPersonal"
                                                value="Acceder">Cambiar Datos</button>
                                        </p>
                                    @empty

                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Fecha de nacimiento</label>
                                            <input name="fecha_nacimiento" id="fecha_nacimiento" value="" class="woocommerce-Input woocommerce-Input--text input-text" type="date" style=" color: #666;  padding: .75em;  height: auto; border-width: 1px; border-style: solid; border-radius: 2px; box-shadow: none; box-sizing: border-box; transition: all .2s linear;"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Region</label>
                                            <input name="region" id="region" value="" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Comuna</label>
                                            <input name="comuna" id="comuna" value="" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Calle</label>
                                            <input name="calle_avenida" id="calle_avenida" value="" class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Numero</label>
                                            <input name="numero" id="numero" value="" style="max-width: 100% !important" class="woocommerce-Input woocommerce-Input--text input-text"  type="number"
                                                />
                                        </p>
                                        <p class="form-row">
                                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                                value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                                value="/wordpress/my-account/" /> 
                                                <button type="submit"
                                                class="woocommerce-button button woocommerce-form-login__submit" name="btnPersonal" id="btnPersonal"
                                                value="Acceder">Cambiar Datos</button>
                                        </p>

                                    @endforelse
                            </form>
                        </div>
                    </div><!-- .entry-content .clear -->
                </article><!-- #post-## -->


                <article class="post-99 page type-page status-publish ast-article-single padding-middle"  itemtype="https://schema.org/CreativeWork">
                    <div class="entry-content clear" itemprop="text">
                        <div class="woocommerce">
                            <header class="entry-header ast-no-thumbnail ast-no-meta" style="margin-top: 30px">
                                <h1 class="entry-title" itemprop="headline">Cambiar mi contraseña</h1>	
                            </header>
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-form woocommerce-form-login login" name="formPassword" id="formPassword">
                                @csrf
                                @foreach($reciclaje as $recicla)
                                <input type="hidden" name="userid" value="{{$recicla->id}}">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Correo electrónico&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text"
                                        name="email" id="username" autocomplete="username" value="{{$recicla->email}}" disabled />
                                </p>
                                @endforeach
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Contraseña&nbsp;<span class="required">*</span></label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                        name="password" id="password" autocomplete="current-password" />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Confirmar Contraseña&nbsp;<span class="required">*</span></label>
                                    <input onchange="validPassword()" class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                        name="password" id="passwordconf" autocomplete="current-password" />
                                </p>
                                <p class="form-row">
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                        value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                        value="/wordpress/my-account/" /> <button type="submit" id="btnPassword"
                                        class="woocommerce-button button woocommerce-form-login__submit" name="login"
                                        value="Acceder">Cambiar Contraseña</button>
                                </p>
                            </form>
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
    function validPassword() {
        if($('#password').val() !== $('#passwordconf').val() ){
            Swal.fire({
                title: "Alerta!",
                text: "Las contraseñas no coinciden!",
                type: "info",
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
            $('#password').val('')
            $('#passwordconf').val('')
        }
    }
</script>
<script src="{{asset('js/publico/publico-account-setting.js')}}"></script>
<script>
    console.log('reciclaje', {!! $reciclaje !!})
    console.log('informacion', {!! $informacion !!})
</script>
@endsection
