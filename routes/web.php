<?php

use App\Http\Controllers\ClienteExternoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsoInternoController;
use App\Http\Controllers\ExportController;

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
    

//CONFIGURACION INTERNA

    Route::get('/dashboard', [UsoInternoController::class, 'listarUsuarios'])->name('dashboard');
    Route::post('/crear-usuario-interno',[UsoInternoController::class, 'usuarioCrear'])->name('crear-usuario-interno');

    Route::get('/registrarusuario', function () {
        return Inertia::render('CrearUsuario');
    })->name('crearusuario');

    Route::get('/modal', function () {
        return Inertia::render('ClientesExternos/ShowEmpresaModal');
    });

    Route::get('/add-compania', function () {return Inertia::render('CrearCompania'); })->name('add-compania');
    Route::post('/crear-cia',[UsoInternoController::class, 'ciaCrear'])->name('crear-cia');
    Route::get('/show-cias',[UsoInternoController::class, 'showCias'])->name('show-cias');


    Route::get('/show-cliente/{id}',[UsoInternoController::class, 'showCliente'])->name('show-cliente');
    Route::get('/edit-show-cliente/{id}',[UsoInternoController::class, 'editShowCliente'])->name('show-cliente-id');
    Route::post('/crud/edit-cliente-back',[UsoInternoController::class, 'editCliente']);
    ROute::delete('/crud/delete-cliente/{id}', [UsoInternoController::class, 'deleteCliente']);

//CIAS SEGUROS
    Route::get('/show-cia/{id}',[UsoInternoController::class, 'showCia']);
    Route::get('/edit-cia/{id}',[UsoInternoController::class, 'editCia']);
    Route::post('/crud/edit-cia-back',[UsoInternoController::class, 'editCia']);
    ROute::delete('/crud/delete-cia/{id}', [UsoInternoController::class, 'deleteCia']);



// CLIENTES EXTERNOS EMPRESA
    Route::get('/crear-empresa', function () {return Inertia::render('CrearEmpresa'); })->name('crear-empresa');
    Route::post('/guardar-empresa',[ClienteExternoController::class, 'guardarEmpresa'])->name('guardar-empresa');
    Route::get('/show-empresas',[ClienteExternoController::class, 'showEmpresas'])->name('show-empresas');
    Route::get('/crud/show-empresa/{id}',[ClienteExternoController::class, 'showEmpresa']);
    Route::get('/crud/edit-show-cia/{id}',[ClienteExternoController::class, 'editShowEmpresa']);
    Route::post('/crud/edit-empresa-back',[ClienteExternoController::class, 'editEmpresa']);
    ROute::delete('/crud/delete-empresa/{id}', [ClienteExternoController::class, 'deleteEmpresa']);


// CLIENTES EXTERNOS USUARIO
    
    Route::post('/crear-usuario-externo',[ClienteExternoController::class, 'guardarClienteExterno'])->name('crear-usuario-externo');
    Route::get('/show-cliente-externo',[ClienteExternoController::class, 'showClientesExternos'])->name('show-cliente-externo');
    Route::get('/show-cliente-externo/{id}',[ClienteExternoController::class, 'showClienteExterno']);
    Route::post('/crud/edit-usuario-externo',[ClienteExternoController::class, 'editUsuarioExterno']);
    Route::delete('/crud/delete-usuario-externo/{id}',[ClienteExternoController::class, 'deleteUsuarioExterno']);

#POLIZA
    Route::get('/view-add-poliza', [UsoInternoController::class, 'ViewAddPoliza'])->name('view-add-poliza');
    Route::post('/crear-poliza',[UsoInternoController::class, 'polizaCrear'])->name('crear-poliza');
    Route::get('/show-polizas', [UsoInternoController::class, 'showPolizas'])->name('show-polizas');
    Route::get('/show-poliza/{id}',[UsoInternoController::class, 'showPoliza']);
    Route::post('/crud/edit-poliza',[UsoInternoController::class, 'editPoliza']);
    Route::delete('/crud/delete-poliza/{id}',[UsoInternoController::class, 'deletePoliza']);




    Route::get('/export-users', [UsoInternoController::class, 'export']);


// APIS
    Route::get('/api/clientes', [UsoInternoController::class, 'search']);


});
