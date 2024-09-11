<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garaje extends Model
{
    protected $primaryKey = 'id_garaje';
    protected $table = 'garaje'; // Especifica el nombre de la tabla

    // Definir qué campos se pueden llenar de forma masiva
    protected $fillable = ['descripcion', 'estados_estado_id'];

    // Relación con el modelo Estado
    public function estado()
    {
        // Cambiar 'estado_id' a 'estados_estado_id'
        return $this->belongsTo(Estado::class, 'estados_estado_id', 'estado_id');
    }

    // Relación con el modelo Parking
    public function parking()
    {
        return $this->hasMany(Parking::class, 'Garaje_id_garaje');
    }
}

