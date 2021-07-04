@extends('app')
@section('css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main-all" class="site-main" >
				<article class="post-97 page type-page status-publish ast-article-single" >
		            <header class="entry-header ast-no-thumbnail ast-no-meta">
                        <h1 class="entry-title" itemprop="headline">Titulo</h1>	
                    </header>
	                <div class="entry-content clear" itemprop="text">    
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-cart-form"  >
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a class="remove" style="color:var(--global-primary);border: 1px solid var(--global-primary);">✔</a>						
                                            </td>
                                            <td class="product-thumbnail">
                                                <a ><img width="300" height="300" alt="" src="${element.img}" ></a>						
                                            </td>

                                            <td class="product-name" data-title="Producto">
                                                <a >${element.titulo}</a>						
                                            </td>

                                            <td class="product-price" data-title="Precio">
                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>${element.price}</bdi></span>						
                                            </td>

                                            <td class="product-quantity" data-title="Cantidad">
                                                <div class="quantity buttons_added">
                                                    <a onclick="unitProducts('minus',${index})" class="minus" style="cursor:pointer">-</a>
                                                    <label class="screen-reader-text" for="quantity-${index}">${element.titulo}</label>
                                                    <input type="number" id="quantity-${index}" class="input-text qty text" step="1" min="0" max=""  value="${element.unit}" title="Cantidad" size="4"  inputmode="numeric">
                                                    <a onclick="unitProducts('plus',${index})" style="cursor:pointer" class="plus">+</a>
                                                </div>
                                            </td>

                                            <td class="product-subtotal" data-title="Subtotal">
                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>${element.total}</bdi></span>						
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a class="remove" style="color:#D94F4F;border: 1px solid #D94F4F;">×</a>						
                                            </td>
                                            <td class="product-thumbnail">
                                                <a ><img width="300" height="300" alt="" src="${element.img}" ></a>						
                                            </td>

                                            <td class="product-name" data-title="Producto">
                                                <a >${element.titulo}</a>						
                                            </td>

                                            <td class="product-price" data-title="Precio">
                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>${element.price}</bdi></span>						
                                            </td>

                                            <td class="product-quantity" data-title="Cantidad">
                                                <div class="quantity buttons_added">
                                                    <a onclick="unitProducts('minus',${index})" class="minus" style="cursor:pointer">-</a>
                                                    <label class="screen-reader-text" for="quantity-${index}">${element.titulo}</label>
                                                    <input type="number" id="quantity-${index}" class="input-text qty text" step="1" min="0" max=""  value="${element.unit}" title="Cantidad" size="4"  inputmode="numeric">
                                                    <a onclick="unitProducts('plus',${index})" style="cursor:pointer" class="plus">+</a>
                                                </div>
                                            </td>

                                            <td class="product-subtotal" data-title="Subtotal">
                                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>${element.total}</bdi></span>						
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            
                            <p>
                                Su compra fue realizada con exito, numero de ticker 0001...
                            </p>
                            <p>
                                Error al realizar la compra...
                            </p>
                        </div>        
                    </div>        
                </article>
				
            </main>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

<script>

</script>
@endsection
