<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        // Obtén los anuncios ordenados por la fecha de creación en orden descendente
        $anuncios = Anuncio::orderBy('created_at', 'desc')->get();

        // Retorna la vista de inicio con los anuncios
        return view('inicio', ['anuncios' => $anuncios]);
    }
}


