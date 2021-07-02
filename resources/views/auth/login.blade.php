@extends('app')
@section('css')

@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-99 page type-page status-publish ast-article-single" id="post-99"
                    itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header ast-no-thumbnail ast-no-meta">

                        <h1 class="entry-title" itemprop="headline">My account</h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content clear" itemprop="text">


                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>

                            <h2>Acceder</h2>

                            <form class="woocommerce-form woocommerce-form-login login" method="POST" action="{{route('login')}}">
                                @csrf
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Nombre de usuario o correo electrónico&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                        name="email" id="username" autocomplete="username" value="" />
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
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                        value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                        value="/wordpress/my-account/" /> <button type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit" name="login"
                                        value="Acceder">Acceder</button>
                                </p>
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="lost-password/index.html">¿Olvidaste la contraseña?</a>
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
@endsection
