<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotas públicas
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public.index');
Route::get('/veiculo/{id}', [App\Http\Controllers\PublicController::class, 'show'])->name('public.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas administrativas (requer autenticação)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('marcas', App\Http\Controllers\Admin\MarcaController::class)->except(['show']);
    Route::resource('modelos', App\Http\Controllers\Admin\ModeloController::class)->except(['show']);
    Route::resource('cores', App\Http\Controllers\Admin\CorController::class)->except(['show']);
    Route::resource('veiculos', App\Http\Controllers\Admin\VeiculoController::class)->except(['show']);
});
