<?php
// App\Models\Parking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = 'parking';
    protected $primaryKey = 'codigo_transaccion';

    protected $fillable = [
        'codigo_parqueadero',
        'Garaje_id_garaje',
        'placa',
        'fecha_hora_entrada',
        'fecha_hora_salida',
        'factura_no_factura',
        'tarifa_por_minuto' 
    ];

    protected $casts = [
        'fecha_hora_entrada' => 'datetime',
    ];

    // Relación con la tabla 'factura', que ahora puede ser NULL inicialmente
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_no_factura', 'no_factura')->nullable();
    }

    // Relación con la tabla 'garaje'
    public function garaje()
    {
        return $this->belongsTo(Garaje::class, 'Garaje_id_garaje');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa', 'placa'); // Si la relación es por placa
    }
    
    // Modelo Vehiculo
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'propietario_id');
    }
    

}
