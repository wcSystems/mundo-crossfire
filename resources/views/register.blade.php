@extends('app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-99 page type-page status-publish ast-article-single"  itemtype="https://schema.org/CreativeWork">
                    <header class="entry-header ast-no-thumbnail ast-no-meta">
                        <h1 class="entry-title" itemprop="headline">Registro</h1>	
                    </header>
                    <div class="entry-content clear" itemprop="text">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form method="POST" action="{{ route('register')}}" class="woocommerce-form woocommerce-form-login login" onsubmit="return verificarEmail()">
                                @csrf
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Nombre y apellido&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                     name="name" id="name" required />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="username">Correo electrónico&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text"
                                        name="email" id="email" autocomplete="email" value="" required />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Contraseña&nbsp;<span class="required">*</span></label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                        name="password" id="password" autocomplete="current-password" required />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Confirmar Contraseña&nbsp;<span class="required">*</span></label>
                                    <input onchange="validPassword()" class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                        name="password_confirmation" id="passwordconf" autocomplete="current-password" required/>
                                </p>
                                <p class="form-row">
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                        value="85d46cefc4" /><input type="hidden" name="_wp_http_referer"
                                        value="/wordpress/my-account/" /> <button type="submit" id="btnEnviarRegistro"
                                        class="woocommerce-button button woocommerce-form-login__submit" name="login"
                                        value="Acceder">Registrar</button>
                                </p>
                            </form>
                        </div>
                    </div><!-- .entry-content .clear -->
                </article>
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

    function verificarEmail(){
        var email= document.getElementById('email').value;

        $.ajax({
            data: {email:email},
            url: "/api/emailCheck",
            type: "POST",
            dataType: 'json',
            success: function (data) {
            
                if(data==1){
                    Swal.fire({
                        title: "Error!",
                        text: "El Correo ya Existe!",
                        type: "info",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                    return false;
                }
                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
</script>
@endsection
