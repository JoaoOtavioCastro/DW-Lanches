<?php

use App\Http\Controllers\PratoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prato', [PratoController::class, 'index'])->name('prato.index');
Route::get('/prato/{id}', [PratoController::class, 'show'])->name('prato.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/pratos/create', [PratoController::class, 'create'])->name('prato.create');
    Route::get('/pratos/my', [PratoController::class, 'my'])->name('prato.my');
    Route::post('/prato', [PratoController::class, 'store'])->name('prato.store');
    Route::get('/prato/{prato}/edit', [PratoController::class, 'edit'])->name('prato.edit');
    Route::put('/prato/{prato}', [PratoController::class, 'update'])->name('prato.update');
    Route::delete('/prato/{prato}', [PratoController::class, 'destroy'])->name('prato.destroy');
    Route::post('/prato/{prato}/pedir', [PratoController::class, 'pedir'])->name('prato.pedir');
    Route::delete('/prato/{prato}/cancelar', [PratoController::class, 'cancelar'])->name('prato.cancelar');
    Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');
    Route::get('/pedido', [PedidoController::class, 'show'])->name('pedido.show');
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');
    Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
    Route::delete('/pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
});
