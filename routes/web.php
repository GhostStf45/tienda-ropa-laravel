<?php

use App\Http\Controllers\MarcasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedoresController;
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
