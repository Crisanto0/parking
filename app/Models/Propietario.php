<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = 'propietarios';
    protected $primaryKey = 'propietario_id';
    protected $fillable = [
        'nombre', 'apellido', 'email', 'telefono', 'direccion', 'tipo_identificacion', 'numero_identificacion'
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'propietario_id');
    }
}
