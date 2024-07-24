<?php

use App\Http\Controllers\PratoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prato', [PratoController::class, 'index'])->name('prato.index');
Route::get('/prato/{id}', [PratoController::class, 'show'])->name('prato.show');
Route::get('/pratos/create', [PratoController::class, 'create'])->name('prato.create');
Route::post('/prato/store', [PratoController::class, 'store'])->name('prato.store');
Route::get('/prato/{prato}/edit', [PratoController::class, 'edit'])->name('prato.edit');
Route::put('/prato/{prato}', [PratoController::class, 'update'])->name('prato.update');
Route::delete('/prato/{prato}', [PratoController::class, 'destroy'])->name('prato.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
