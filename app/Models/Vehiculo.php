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
        'placa', 'marca', 'modelo', 'no_chasis', 'tipo_vehiculo', 'color', 'propietario_id'
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'propietario_id');
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

    
    public $timestamps = false;
}
