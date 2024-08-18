<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'login']);



use App\Http\Controllers\InicioController;
Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');




use App\Http\Controllers\AnuncioController;

    Route::resource('anuncios', AnuncioController::class);


route::get('/anuncios',function(){
    return view('anuncios');
})->name('anuncios');

use App\Http\Controllers\EmpleadoController;

// Ruta para mostrar el formulario
Route::get('/registrarempleado', function(){
    return view('registrarempleado');
})->name('registrarempleado');

// Ruta para procesar el formulario (manejar la solicitud POST)
Route::post('/registrarempleado', [EmpleadoController::class, 'store'])->name('registrarempleado');



Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión establecida exitosamente a la base de datos " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "No se pudo conectar a la base de datos. Por favor, verifica tu configuración. Error:" . $e;
    }
});
use App\Http\Controllers\UsuarioController;
Route::get('/consultas', [UsuarioController::class, 'mostrarUsuarios']);
Route::post('/consultas', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
