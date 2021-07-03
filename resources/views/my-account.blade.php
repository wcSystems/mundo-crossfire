@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Mi Cuenta - Mundo Crossfire">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mundo-crossfire.com.ve">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mi Cuenta - Mundo Crossfire">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mi Cuenta - Mundo Crossfire">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-99 page type-page status-publish ast-article-single" id="post-99"
                    itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header ast-no-thumbnail ast-no-meta">

                        <h1 class="entry-title" itemprop="headline">Mi cuenta</h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content clear" itemprop="text">


                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>

                            <h2>Acceder</h2>

                            <form id="data-login-form" class="woocommerce-form woocommerce-form-login login" method="POST" action="{{route('login')}}">
                                @csrf
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Nombre de usuario o correo electrónico&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                        name="email" id="email" autocomplete="username" value="" />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Contraseña&nbsp;<span class="required">*</span></label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                        name="password" id="password" autocomplete="current-password" />
                                </p>
                                <p class="form-row">
                                    <label
                                        class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                            name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                        <span>Recuérdame</span>
                                    </label>
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="85d46cefc4" /><input type="hidden" name="_wp_http_referer" value="/wordpress/my-account/" />
                                    
                                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Acceder">Acceder</button>
                                   

                                    <a href="/subscription" class="woocommerce-button button " role="button">
                                        Suscribirme
                                            
                                    </a>
                                </p>
                                <p style="margin-bottom: 0px;" class="woocommerce-LostPassword lost_password">
                                    <a href="password/reset">Olvido Su Contraseña</a>
                                </p>
                                <p style="margin-bottom: 0px;" class="woocommerce-LostPassword lost_password">
                                    <a href="registro">Registrarme como usuario no asociado</a>
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
<script>
    let error = ( {!! $errors !!} ) ? {!! $errors !!} : []

    if( error.email ){
        if ( error.email[0] === 'These credentials do not match our records.' ) {
            Swal.fire({
                title: "Alerta!",
                text: "Usuario o contraseña incorrecta",
                type: "info",
                timer: 10000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }
        if ( error.email[0] === 'The email field is required.' ) {
            Swal.fire({
                title: "Alerta!",
                text: "Usuario o contraseña vacio",
                type: "info",
                timer: 10000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }
    }
</script>
@endsection
