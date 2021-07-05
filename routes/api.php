<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\PaqueteController;
use App\Http\Controllers\Admin\KitsController;
use App\Http\Controllers\Admin\MensajesController;
use App\Http\Controllers\Admin\ClientesSuscriptosController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\EstadisticasController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductosController;
use App\Http\Controllers\Admin\SubcategoriasController;
use App\Http\Controllers\Admin\CajasController;
use App\Http\Controllers\Publico\HomeController;
use App\Http\Controllers\Publico\ShopController;
use App\Http\Controllers\SubscriptionController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API PARA MOSTRAR LAS CATEGORIAS EN LOS SELECT
Route::get('/list-categorias',[CategoriasController::class,'list_categorias'])->name('list-categorias');

//API PARA MOSTRAR LOS PAQUETES EN LOS SELECT
Route::get('/list-paquete',[PaqueteController::class,'list_paquete'])->name('list_paquete');

//API PARA MOSTRAR LA LISTA DE KITS
Route::get('/list-kits',[KitsController::class,'listKits'])->name('list_Kits');

//API PARA ELIMINAR TODOS LOS MENSAJES
Route::get('/admin-mensajes-delete',[MensajesController::class,'deleteAll'])->name('delete-mensajes');

//API PARA ENVIAR MENSAJE EN LA PAGINA DE HOME
Route::post('/sendMensaje',[HomeController::class, 'sendMensaje'])->name('send-mensaje');

//API PARA ENVIAR INFORMACION DE KITS
Route::get('/sendKits/{id}',[ClientesSuscriptosController::class, 'sendKits'])->name('send-kits');

//API PARA ENVIAR INFO DE TICKET 
Route::get('/sendInfoTicket/{ticket}',[HomeController::class, 'sendInfoTicket'])->name('send-info-ticket');

//API PARA GUARDAR RECICLAJES
Route::post('/reciclaje',[ClientesController::class, 'reciclaje'])->name('reciclaje');

//API PARA ACTUALIZAR INFORMACION PERSONAL DEL USUARIO
Route::post('/updateInfoUser',[HomeController::class, 'updateInfoUser'])->name('updateInfoUser');

//API PARA ACTUALIZAR CLAVE Y CORREO DEL USUARIO
Route::post('/updatePassword',[HomeController::class, 'updatePassword'])->name('updatePassword');

//API PARA ENVIAR INFO DE SUSCRIPCION 
Route::get('/sendInfoSuscripcion/{nro_suscripcion}',[HomeController::class, 'sendInfoSuscripcion'])->name('send-info-suscripcion');

//API PARA VERIFICAR SI EXISTE EL CORREO AL REGISTRARSE
Route::post('/emailCheck',[HomeController::class, 'emailCheck'])->name('emailCheck');

//API PARA ENVIAR FECHAS EN ADMIN DE SUSCRIPCION
Route::post('/saveFechas',[ClientesSuscriptosController::class, 'saveFechas'])->name('saveFechas');

//API PARA ENVIAR FECHAS SUSCRIPCION A ADMIN
Route::get('/fechas-admin-suscripciones/{id_sus}',[ClientesSuscriptosController::class, 'fechasSuscripciones'])->name('fechas-admin-suscripciones');

// API FILTER PRODUCTOS POR CATEGORIA
Route::post('/get/product/category/',[ShopController::class, 'filter'])->name('filter.producto.category');

//API PARA FILTRAR SUBCATEGORIA
Route::post('/get/product/subcategory/',[ShopController::class, 'filterSubcategory'])->name('filter.producto.subcategory');

//API PARA GRAFICAS DE INDEX ADMIN
Route::get('/envioGraficas',[EstadisticasController::class,'envioGraficas'])->name('envioGraficas');

//API PARA ENVIAR INFORMACION DE MASCOTAS
Route::get('/sendMascotas/{suscrip_id}',[ClientesSuscriptosController::class, 'sendMascotas'])->name('send-mascotas');

//API PARA NOTIFICACIONES EN ADMIN
Route::get('/notificacion-admin',[AdminController::class,'notificacionesAdmin'])->name('notificacion-admin');
Route::get('/log-admin',[AdminController::class,'logAdmin'])->name('log-admin');

//API PARA VALIDAR ORDEN DE MUESTRA
Route::get('/validateOrder',[ProductosController::class,'validateOrder'])->name('validateOrder');

//API PARA ENVIAR SUBCATEGORIAS PARA EDITAR
Route::get('/enviarSubcategory/{id}',[SubcategoriasController::class,'enviarSubcategory'])->name('enviarSubcategory');

//API PARA ENVIAR SUBCATEGORIAS POR CATEGORIA SELECCIONADA
Route::get('/enviarSubcategoryPorCategoria',[SubcategoriasController::class,'enviarSubcategoryPorCategoria'])->name('enviarSubcategoryPorCategoria');

//API PARA ENVIAR INFO DE CAJAS
Route::get('/show-info-cajas/{id}',[CajasController::class,'enviarInfoCajas'])->name('enviarInfoCajas');









//SENDIMGS3
Route::post('/imgs3',[CajasController::class,'sendImgS3']);

//TEST PARA IMAGENES DE CAJAS
Route::post('builder', function (Request $request) {
    return response()->json($request->descripcion_cajas);
});
