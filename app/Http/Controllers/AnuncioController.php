<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{
    public function index(Request $request)
{
    $query = Anuncio::query();
    
    // Búsqueda
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('descripcion', 'like', "%{$search}%");
    }

    // Ordenar por fecha descendente
    $anuncios = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('anuncios.index', compact('anuncios'));
}


    public function create()
    {
        return view('anuncios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Crear un nuevo anuncio
        $anuncio = new Anuncio();
        $anuncio->descripcion = $request->descripcion;
        $anuncio->usuarios_usuario_id = Auth::id();

        // Manejar la subida de la imagen si existe
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('anuncios', 'public');
            $anuncio->imagen = $imagePath;
        }

        // Guardar el anuncio en la base de datos
        $anuncio->save();

        // Redirigir a la página de anuncios con un mensaje de éxito
        return redirect()->route('anuncios.index')->with('success', 'Anuncio creado exitosamente');
    }

    public function edit($id_anuncio)
    {
        $anuncio = Anuncio::findOrFail($id_anuncio);
        return view('anuncios.edit', compact('anuncio'));
    }

    public function update(Request $request, $id_anuncio)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $anuncio = Anuncio::findOrFail($id_anuncio);
        $anuncio->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($anuncio->imagen) {
                Storage::delete('public/' . $anuncio->imagen);
            }
            $imagePath = $request->file('imagen')->store('anuncios', 'public');
            $anuncio->imagen = $imagePath;
        }

        $anuncio->save();

        return redirect()->route('anuncios.index')->with('success', 'Anuncio actualizado exitosamente');
    }

    public function destroy($id_anuncio)
    {
        $anuncio = Anuncio::findOrFail($id_anuncio);
        
        // Eliminar la imagen del almacenamiento
        if ($anuncio->imagen) {
            Storage::delete('public/' . $anuncio->imagen);
        }
        
        $anuncio->delete();

        return redirect()->route('anuncios.index')->with('success', 'Anuncio eliminado exitosamente');
    }
}
