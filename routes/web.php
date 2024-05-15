<?php

use App\Http\Controllers\ClienteExternoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsoInternoController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', [UsoInternoController::class, 'listarUsuarios'])->name('dashboard');
    Route::post('/crear-usuario-interno',[UsoInternoController::class, 'usuarioCrear'])->name('crear-usuario-interno');

    Route::get('/registrarusuario', function () {
        return Inertia::render('CrearUsuario');
    })->name('crearusuario');

    Route::get('/add-compania', function () {return Inertia::render('CrearCompania'); })->name('add-compania');
    Route::post('/crear-cia',[UsoInternoController::class, 'ciaCrear'])->name('crear-cia');

// CLIENTES EXTERNOS
    Route::get('/crear-empresa', function () {return Inertia::render('CrearEmpresa'); })->name('crear-empresa');
    Route::post('/guardar-empresa',[ClienteExternoController::class, 'guardarEmpresa'])->name('guardar-empresa');


    #POLIZA
    Route::get('/view-add-poliza', [UsoInternoController::class, 'ViewAddPoliza'])->name('view-add-poliza');
    Route::post('/crear-poliza',[UsoInternoController::class, 'polizaCrear'])->name('crear-poliza');
    Route::get('/show-polizas', [UsoInternoController::class, 'showPolizas'])->name('show-polizas');

    Route::get('/cliente',[UsoInternoController::class, 'listarCia'])->name('cliente');

    // APIS
    Route::get('/api/clientes', [UsoInternoController::class, 'search']);


});
