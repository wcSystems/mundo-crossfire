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


Auth::routes();