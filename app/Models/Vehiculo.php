<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'propietario_id';
    protected $fillable = [
        'propietario_id', 'marca', 'modelo', 'placa', 'tipo_vehiculo', 'color'
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
    public $timestamps= false;
}
