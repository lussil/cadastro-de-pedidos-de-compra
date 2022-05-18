<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto/create', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::put('/produto/{id}/edit', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produto/{id}/', [ProdutoController::class, 'destroy'])->name('produto.destroy');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente/create', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/cliente/{id}/edit', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/cliente/{id}/', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');
    Route::get('/pedido/create', [PedidoController::class, 'create'])->name('pedido.create');
    Route::post('/pedido/create', [PedidoController::class, 'store'])->name('pedido.store');
    Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');
    Route::get('/pedido/{id}/edit', [PedidoController::class, 'edit'])->name('pedido.edit');
    Route::put('/pedido/{id}/edit', [PedidoController::class, 'update'])->name('pedido.update');
    Route::delete('/pedido/{id}/', [PedidoController::class, 'destroy'])->name('pedido.destroy');

    Route::get('/pedido_produto/{id}', [PedidoProdutoController::class, 'index'])->name('pedido_produto.index');
    Route::get('/pedido_produto/{id}/create', [PedidoProdutoController::class, 'create'])->name('pedido_produto.create');
    Route::post('/pedido_produto/{id}/create', [PedidoProdutoController::class, 'store'])->name('pedido_produto.store');
    Route::get('/pedido_produto/{id}/edit', [PedidoProdutoController::class, 'edit'])->name('pedido_produto.edit');
    Route::put('/pedido_produto/{id}/edit', [PedidoProdutoController::class, 'update'])->name('pedido_produto.update');
    Route::delete('/pedido_produto/{id}/', [PedidoProdutoController::class, 'destroy'])->name('pedido_produto.destroy');
});

require __DIR__ . '/auth.php';
