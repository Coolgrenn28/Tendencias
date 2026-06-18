<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TransportistaController;
use App\Http\Controllers\EstadoPedidoController;
use App\Http\Controllers\ProfileController;
use App\Exceptions\Error403Exception;
use App\Exceptions\Error404Exception;
use App\Exceptions\Error500Exception;
use App\Exceptions\Error419Exception;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Tracking público
Route::get('/tracking', [PedidoController::class, 'trackingForm'])->name('tracking.form');
Route::post('/tracking', [PedidoController::class, 'trackingBuscar'])->name('tracking.buscar');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clientes
    Route::resource('clientes', ClienteController::class);
    Route::get('/cambioestadocliente', [ClienteController::class, 'cambioEstado']);
    Route::get(
    '/clientes-excel',
    [ClienteController::class, 'exportExcel']
)->name('clientes.excel');

    // Productos
    Route::resource('productos', ProductoController::class);
    Route::get('/cambioestadoproducto', [ProductoController::class, 'cambioEstado']);

    // Pedidos
    Route::resource('pedidos', PedidoController::class);
    Route::get('/cambioestadopedido', [PedidoController::class, 'cambioEstado']);
    Route::get(
    '/pedidos/pdf/{id}',
    [PedidoController::class, 'pdf']
)->name('pedidos.pdf');

    // Transportistas
    Route::resource('transportistas', TransportistaController::class);
    Route::get('/cambioestadotransportista', [TransportistaController::class, 'cambioEstado']);

    // Estados Pedido
    Route::resource('estados', EstadoPedidoController::class);
    Route::get('/cambioestadoestadopedido', [EstadoPedidoController::class, 'cambioEstado']);
});

Route::get('/error404', function () {
    throw new Error404Exception();
});

Route::get('/error403', function () {
    throw new Error403Exception();
});

Route::get('/error500', function () {
    throw new Error500Exception();
});
Route::get('/error419', function () {
    throw new Error419Exception();
});

require __DIR__.'/auth.php';