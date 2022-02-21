<?php

use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\TiposRopaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\VentasController;

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

Route::get('/', function () {
    return view('home');
});

 // -------------------------------- Administracion de vendedores -------------------------------- //
Route::get('/vendedores',[VendedoresController::class, 'index'])->name('vendedores.list');
Route::post('/vendedores/crear',[VendedoresController::class, 'store'])->name('vendedores.store');
Route::get('/vendedores/leer/{id}',[VendedoresController::class, 'show'])->name('vendedores.show');
Route::put('/vendedores/actualizar/{id}',[VendedoresController::class, 'update'])->name('vendedores.update');

//#########################################################################################################

 // -------------------------------- Administracion de marcas -------------------------------- //
 Route::get('/marcas',[MarcasController::class, 'index'])->name('marcas.list');
 Route::post('/marcas/crear',[MarcasController::class, 'store'])->name('marcas.store');
 Route::get('/marcas/leer/{id}',[MarcasController::class, 'show'])->name('marcas.show');
 Route::put('/marcas/actualizar/{id}',[MarcasController::class, 'update'])->name('marcas.update');
 // -------------------------------- ---------------------------------------------------------- //
 // -------------------------------- Administracion de tipos de ropa -------------------------------- //
 Route::get('/tiposRopa',[TiposRopaController::class, 'index'])->name('tiposRopa.list');
 Route::post('/tiposRopa/crear',[TiposRopaController::class, 'store'])->name('tiposRopa.store');
 Route::get('/tiposRopa/leer/{id}',[TiposRopaController::class, 'show'])->name('tiposRopa.show');
 Route::put('/tiposRopa/actualizar/{id}',[TiposRopaController::class, 'update'])->name('tiposRopa.update');
 // -------------------------------- ---------------------------------------------------------- //

 // -------------------------------- Administracion de ropa -------------------------------- //
 Route::get('/productos',[ProductosController::class, 'index'])->name('productos.list');
 Route::post('/productos/crear',[ProductosController::class, 'store'])->name('productos.store');
 Route::get('/productos/leer/{id}',[ProductosController::class, 'show'])->name('productos.show');
 Route::put('/productos/actualizar/{id}',[ProductosController::class, 'update'])->name('productos.update');
 // -------------------------------- ---------------------------------------------------------- //

  // -------------------------------- Administracion de tiendas -------------------------------- //
  Route::get('/tiendas',[TiendasController::class, 'index'])->name('tiendas.list');
  Route::post('/tiendas/crear',[TiendasController::class, 'store'])->name('tiendas.store');
  Route::get('/tiendas/leer/{id}',[TiendasController::class, 'show'])->name('tiendas.show');
  Route::put('/tiendas/actualizar/{id}',[TiendasController::class, 'update'])->name('tiendas.update');
  // -------------------------------- ---------------------------------------------------------- //
  // -------------------------------- Administracion de ventas -------------------------------- //
  Route::get('/ventas',[VentasController::class, 'index'])->name('ventas.list');
  Route::post('/ventas/crear',[VentasController::class, 'store'])->name('ventas.store');
  Route::get('/ventas/leer/producto/{id}',[VentasController::class, 'show'])->name('ventas.show');
  Route::get('/ventas/productos',[VentasController::class, 'showProductos'])->name('ventas.showProductos');
  Route::get('/ventas/vendedores',[VentasController::class, 'showVendedores'])->name('ventas.showVendedores');
  // -------------------------------- ---------------------------------------------------------- //
