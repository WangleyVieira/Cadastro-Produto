<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('pedido.index');
});

Route::group(['prefix' => 'pedido', 'as' => 'pedido.'], function() {
    Route::get('/index', [PedidoController::class, 'index'])->name('index');
    Route::get('/create', [PedidoController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [PedidoController::class, 'edit'])->name('edit');
    Route::post('/store', [PedidoController::class, 'store'])->name('store');
    Route::post('/update/{id}', [PedidoController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [PedidoController::class, 'destroy'])->name('destroy');
    Route::post('/desconto/{id}', [PedidoController::class, 'desconto'])->name('desconto');
});
