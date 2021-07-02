<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ProductosController;
use App\Http\Controllers\Admin\VentasController;
use App\Http\Controllers\Admin\PaqueteController;
use App\Http\Controllers\Admin\KitsController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\ClientesSuscriptosController;
use App\Http\Controllers\Admin\MensajesController;
use App\Http\Controllers\Admin\SeccionHomeController;
use App\Http\Controllers\Admin\EmpleadosController;
use App\Http\Controllers\Admin\ClientesNoRegistradosController;
use App\Http\Controllers\Admin\EnvioController;
use App\Http\Controllers\Admin\CargaMasivaController;
use App\Http\Controllers\Admin\SuscripcionesInactivasController;
use App\Http\Controllers\Admin\MarcasController;
use App\Http\Controllers\Admin\TextoComunasController;
use App\Http\Controllers\Admin\CajasController;
use App\Http\Controllers\Admin\TextoCuotasController;
use App\Http\Controllers\Admin\NewSuscripcionController;
use App\Http\Controllers\Admin\SubcategoriasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Publico\ShopController;
use App\Http\Controllers\Publico\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop-detail/{slug}', [ShopController::class, 'detail'])->name('shop-detail');
Route::get('/my-account', function () { return view('my-account'); })->name('my-account');
Route::get('/account-setting', [HomeController::class, 'settingsAccount'])->name('account-setting');
Route::get('/cart', function () { return view('cart'); })->name('cart');
Route::get('/user-new-form', function () { return view('user-new-form'); })->name('user-new-form');

Route::get('/registro', function () { return view('register'); })->name('registro');



//video publicitario - redireccion a youtube -
Route::get('/conocenos', function () { return view('conocenos'); })->name('conocenos');
Route::get('/politica-de-privacidad', function () { return view('privacy-policies'); })->name('privacy-policies');


Route::get('subscribe-form',[SubscriptionController::class, 'subscribeForm'])->name('subscribe-form');
// ERROR_ROUTER Route::post('subscribe-payment-charge',[SubscriptionController::class, 'susbcriptionPayment'])->name('susbcription-payment');
// ERROR_ROUTER Route::post('subscribe-payment-check',[SubscriptionController::class, 'susbcriptionPaymentCheck'])->name('susbcription-payment');

Route::resource('subscription',SubscriptionController::class);



Route::get('/detail', function () { return view('detail'); })->name('detail');
// Route::get('/subscribe-form', function () { return view('subscribe-form'); })->name('subscribe-form');

//API PARA CREAR CLIENTE Y SUSCRIPCION
Route::post('/crear-cliente-suscripcion',[SubscriptionController::class,'cliente_suscripcion'])->name('crear-cliente-suscripcion');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/history',[HomeController::class, 'history'])->name('history');

    //ENVIAR COMPRA CART
    Route::post('/compra-cart',[ShopController::class, 'compra_cart'])->name('compra-cart');
    Route::get('/payment-pay',[ShopController::class, 'paymentWebpay']);
    Route::get('/payment-history',[ShopController::class, 'paymentWebpayHistory']);


        // MENSAJES PAYMENT
    Route::get('/success/{ticket}', [ShopController::class, 'successPay'])->name('success');
    // Route::get('/error/{ticket}', [ShopController::class, 'errorPay'])->name('error');
   
});
// INVITADOS
Route::get('/error/{ticket}', [ShopController::class, 'errorPay'])->name('error');

Route::post('/payment-pay-invite',[ShopController::class, 'paymentWebpay']);
// ERROR_ROUTER Route::get('/success-invite/{ticket}', [ShopController::class, 'successPay'])->name('success');

Route::post('/check-pay',[ShopController::class, 'checkWebpay']);


Route::group(['middleware' => 'role'], function () {
    //-----------------------------------ADMIN----------------------------------------//
    Route::get('/admin-index',[AdminController::class, 'index'])->name('admin-index');
    Route::get('/admin-index/productos',[AdminController::class, 'productos'])->name('admin-productos');
    //CRUD CATEGORIAS
    Route::resource('categorias',CategoriasController::class);
    //CRUD PRODUCTOS
    Route::resource('productos',ProductosController::class);
    //SAVE IMAGES PRODUCTOS
    Route::post('productos-imagen',[ProductosController::class, 'saveImages'])->name('productos-imagen');
    // VENTAS
    Route::resource('admin-ventas',VentasController::class);
    //Route::get('admin-ventas-pendientes',[VentasController::class,'indexPendiente'])->name('admin-ventas-pendientes');
    //DETALLES VENTAS 
    Route::get('ventas-detalles/{ticket}',[VentasController::class,'sendInfoVentas'])->name('ventas-detalles');
    //BANNER
    Route::resource('admin-banner',BannerController::class);
    //PAQUETES
    Route::resource('admin-paquetes',PaqueteController::class);
    //KITS
    Route::resource('admin-kits',KitsController::class);
    //CLIENTES
    Route::resource('admin-clientes',ClientesController::class);
    //CLIENTES SUSCRIPTOS
    Route::resource('admin-suscripciones',ClientesSuscriptosController::class);
    //MENSAJES
    Route::resource('admin-mensajes',MensajesController::class);
    //SECCIONES
    Route::resource('admin-seccion-home',SeccionHomeController::class);
    //EMPLEADOS
    Route::resource('admin-empleados',EmpleadosController::class);
    //CLIENTES NO REGISTRADOS
    Route::resource('admin-clientes-no-registrados',ClientesNoRegistradosController::class);
    //PRECIO ENVIO
    Route::resource('admin-envio',EnvioController::class);
    //CARGA MASIVA
    Route::resource('admin-carga', CargaMasivaController::class);
    //NO PAGADOS SUSCRIPCIONES
    Route::resource('admin-no-pagados',SuscripcionesInactivasController::class);
    //MARCAS
    Route::resource('admin-marcas', MarcasController::class);
    //COMUNAS TEXTO
    Route::resource('admin-comunas', TextoComunasController::class);
    //CAJAS
    Route::resource('admin-cajas', CajasController::class);
    //CUOTAS
    Route::resource('admin-cuotas', TextoCuotasController::class);
    //NUEVA SUSCRIPCION MANUAL
    Route::resource('admin-new-suscripcion', NewSuscripcionController::class);
    //SUBCATEGORIAS
    Route::resource('admin-subcategorias', SubcategoriasController::class);

});


Auth::routes();
//Route::redirect('/login', '/my-account');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');

//chequear si esta autenticado, lo uso para saber que precio colocar (promocion, socio o no socio)
Route::get('/auth/check',function(){
    return Auth::check() ? Auth::user()->suscribe : false;
});

