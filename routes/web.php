<?php

use Illuminate\Support\Facades\Route;
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

/**
 * Routes for payment pix with MercadoPago
 */

Route::post('sorteio/process_payment', [\App\Http\Controllers\MercadoPagoPixController::class, 'index']);
//servir html para pagamento
//Route::get('/pagamento', [\App\Http\Controllers\MercadoPagoPixController::class, 'pagamento'])->name('pagamento');
Route::any('sorteio/payment/{id}', [\App\Http\Controllers\MercadoPagoPixController::class, 'validTransferPix']);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/sorteio/{nome}', [App\Http\Controllers\Sorteio::class, 'index'])->name('sorteio');
