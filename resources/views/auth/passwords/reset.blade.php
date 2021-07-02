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

                        <h1 class="entry-title" itemprop="headline">&nbsp;</h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content clear" itemprop="text">


                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>

                            <h2>Recuperar Contraseña</h2>

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Correo electrónico:</label>
                                    <input id="email" type="email" class="woocommerce-Input woocommerce-Input--text input-text @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Contraseña:</label>
                                    <input id="password" type="password" class="woocommerce-Input woocommerce-Input--text input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </p>


                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Repetir Contraseña:</label>
                                    <input id="password-confirm" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_confirmation" required autocomplete="new-password">
                                </p>

                                <p class="form-row">
                                    
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                        value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                        value="/wordpress/my-account/" /> <button type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit" name="login"
                                        value="Acceder">Recuperar</button>
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
