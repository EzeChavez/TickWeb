<?php

use App\Http\Controllers\AlquilerCampingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Reservas_Aparts_Controller;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\InformesController;
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

// Rutas de HomeController
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/IniciarSesion', [HomeController::class, 'IniciarSesion']);
Route::get('/reservar', [HomeController::class, 'reservar']);
Route::get('/contacto', [HomeController::class, 'contacto']);

// Rutas de Reservas_Aparts_Controller
Route::get('/reservas', [Reservas_Aparts_Controller::class, 'index'])->name('eventos.index');
Route::get('/reservas/editar', [Reservas_Aparts_Controller::class, 'actualizarReserva'])->name('reservas.edit');
Route::POST('/reservas/editar', [Reservas_Aparts_Controller::class, 'actualizarReserva'])->name('reservas.edit');
Route::resource('aparts', 'App\Http\Controllers\reservasApartsController');
Route::get('/reservas/create', function () {
    return view('reservas_aparts.create');
});
Route::get('/informes', [InformesController::class, 'index'])->name('informes.view');
Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing.view');
Route::get('/finanzas', [FinanzasController::class, 'index'])->name('finanzas.view');
Route::get('/alquileres-camping', [AlquilerCampingController::class, 'index'])->name('AlquilerCamping.view');
Route::get('/inicio-tick', [InicioController::class, 'index'])->name('inicio.view');


// Rutas de ClienteController
Route::resource('clientes', ClienteController::class);
Route::get('/clientes/obtener-nombre/{clienteId}', [ClienteController::class, 'obtenerNombreCliente']);
Route::post('/buscar-clientes', [ClienteController::class,'buscar'])->name('buscar.clientes');
Route::get('/buscar-clientes', [ClienteController::class,'buscar'])->name('buscar.clientes');
// Ruta simple view
Route::get('/simple-view/{id}', [SimpleController::class, 'showSimpleView'])->name('simple.view'); 

// Rutas del dashboard (protegidas por autenticación)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dash');
    })->name('dashboard');
});

// Otras rutas adicionales aquí si es necesario...