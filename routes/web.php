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

route::get('/registrarempleado', function(){
    return view('registrarempleado');
})->name('registrarempleado');


