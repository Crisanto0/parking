<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AnuncioController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crear un nuevo anuncio
        $anuncio = new Anuncio();
        $anuncio->descripcion = $request->descripcion;
        $anuncio->usuarios_usuario_id = Auth::id();

        // Asignar el ID del usuario autenticado

        // Manejar la subida de la imagen si existe
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('anuncios', 'public');
            $anuncio->imagen = $imagePath;
        }

        // Guardar el anuncio en la base de datos
        $anuncio->save();

        // Redirigir a la página de anuncios con un mensaje de éxito
        return redirect()->route('inicio')->with('success', 'Anuncio creado exitosamente');

    }


}
 
