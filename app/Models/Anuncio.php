<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    
        use HasFactory;
    protected $table = 'anuncios';
    protected $primaryKey = 'id_anuncio';
    
        protected $fillable = [
            'descripcion',
            'imagen',
            'usuarios_usuario_id',
        ];
        
    
}