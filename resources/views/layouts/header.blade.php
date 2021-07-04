<style>
    .menu-link{
        padding-right: 10px !important;
        padding-left: 10px !important;}
    .ast-site-header-cart{
        margin-right: 20px}
</style>
<header class="site-header header-main-layout-1 ast-primary-menu-enabled ast-menu-toggle-icon ast-mobile-header-inline ast-above-header-mobile-inline ast-below-header-mobile-inline" id="masthead" itemtype="https://schema.org/WPHeader" itemscope="itemscope" itemid="#masthead">
    <div class="main-header-bar-wrap">
        <div class="main-header-bar">
            <div class="ast-container">
                <div class="ast-flex main-header-container">
                    <div id="site-branding-contain" class="site-branding">
                        <div class="ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope">
                            <span class="site-logo-img">
                                <a href="{{ route('/') }}" class="custom-logo-link" rel="home" aria-current="page">
                                    <img style="max-width: 190px" alt="Willinthon Tech" src="/images/logo.png" class="custom-logo lazyload" />
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="ast-mobile-menu-buttons">
                        <div class="ast-button-wrap">
                            <button type="button" class="menu-toggle main-header-menu-toggle  ast-mobile-menu-buttons-fill" aria-controls='primary-menu' aria-expanded='false'>
                                <span class="screen-reader-text">Menú principal</span>
                                <span class="menu-toggle-icon"></span>
                            </button>
                        </div>
                    </div>
                    <div class="ast-main-header-bar-alignment">
                        <div class="main-header-bar-navigation">
                            <nav class="ast-flex-grow-1 navigation-accessibility" id="site-navigation" aria-label="Navegación del sitio" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope">
                                <div class="main-navigation">
                                    <ul id="primary-menu" class="main-header-menu ast-nav-menu ast-flex ast-justify-content-flex-end  submenu-with-border ast-mega-menu-enabled">
                                        <li id="menu-item-343" 
                                            @if (\Request::is('/')) 
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-343 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                            @else
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-343" 
                                            @endif>
                                                <a href="{{ route('/') }}" class="menu-link">
                                                    <span class="menu-text">Inicio</span>
                                                    <span class="sub-arrow"></span>
                                                </a>
                                        </li>
                                        <li id="menu-item-4582" 
                                            @if (\Request::is('subscription')) 
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4582 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                            @else
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4582" @endif>
                                                <a href="{{ route('subscription.index') }}" class="menu-link">
                                                    <span class="menu-text">Suscripción Box</span>
                                                    <span class="sub-arrow"></span>
                                                </a>
                                        </li>
                                        <li id="menu-item-406" 
                                            @if (\Request::is('shop')) 
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-406 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                            @else
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-406" 
                                            @endif>
                                                <a href="{{ route('shop') }}" class="menu-link">
                                                    <span class="menu-text">Fitness Store</span>
                                                    <span class="sub-arrow"></span>
                                                </a>
                                        </li>
                                        <li id="menu-item-470" 
                                            @if (\Request::is('cart') || \Request::is('my-account')) 
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-470 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                            @else
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-470" 
                                            @endif>
                                                <a href="#" class="menu-link" class="menu-link ">
                                                    <span class="menu-text">
                                                        @if(Auth::check())
                                                            {{Auth::user()->name}}
                                                        @else
                                                            Mi cuenta
                                                        @endif
                                                    </span>
                                                    <span class="sub-arrow"></span>
                                                </a>
                                                <button class="ast-menu-toggle" aria-expanded="false">
                                                    <span class="screen-reader-text">Alternar menú</span>
                                                </button>
                                                <ul class="sub-menu">
                                                    @if(Auth::check() && Auth::user()->role_id == 1)
                                                        <li id="menu-item-472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472" >
                                                            <a href="{{ route('admin-index') }}" class="menu-link" class="menu-link ">
                                                                <span class="menu-text">Administrador</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @auth
                                                        <li id="menu-item-472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472" >
                                                            <a href="{{ route('account-setting') }}" class="menu-link" class="menu-link ">
                                                                <span class="menu-text">Mi perfil</span>
                                                            </a>
                                                        </li>
                                                    @endauth
                                                    @if(!Auth::check())
                                                        <li id="menu-item-472" 
                                                            @if (\Request::is('my-account')) 
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                                            @else
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472" 
                                                            @endif>
                                                                <a href="{{ route('my-account') }}" class="menu-link" class="menu-link ">
                                                                    <span class="menu-text">Cuenta</span>
                                                                </a>
                                                        </li>
                                                    @endif
                                                    <li id="menu-item-471" 
                                                        @if (\Request::is('cart')) 
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-471 menu-item-home current-menu-item page_item page-item-95 current_page_item"
                                                        @else
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-471" 
                                                        @endif>
                                                            <a href="{{ route('cart') }}" class="menu-link" class="menu-link ">
                                                                <span class="menu-text">Carro de Compras</span>
                                                            </a>
                                                    </li>
                                                    @auth
                                                        <li id="menu-item-472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472" >
                                                            <a href="{{ route('history') }}" class="menu-link" class="menu-link ">
                                                                <span class="menu-text">Historial de compras</span>
                                                            </a>
                                                        </li>
                                                    @endauth
                                                    @if(Auth::check())
                                                        <li id="menu-item-472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-472" >
                                                            <a href="{{ route('logout') }}" class="menu-link" class="menu-link ">
                                                                <span class="menu-text">Cerrar Sesión</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="woocommerce-custom-menu-item">
                        <div id="ast-site-header-cart" class="ast-site-header-cart ast-menu-cart-with-border ast-menu-cart-none">
                            <div class="ast-site-header-cart-li ">
                                <a class="cart-container" href="{{ route('cart') }}" title="Ver carrito">
                                    <div class="ast-addon-cart-wrap">
                                        <span class="ast-woo-header-cart-info-wrap">
                                            <span class="ast-woo-header-cart-total">
                                                <span id="total_price_items" class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">&#36;</span>0</bdi>
                                                </span>
                                            </span>
                                        </span>
                                        <i  class="astra-icon ast-icon-shopping-cart " id="total_items" data-cart-total="0"></i>
                                    </div>
                                </a>
                            </div>
                            @if( !\Request::is('cart'))
                                <div id="arr_cart_products"  class="ast-site-header-cart-data"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>