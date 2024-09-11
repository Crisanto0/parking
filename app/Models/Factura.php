<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'no_factura';

    protected $fillable = ['fecha_factura', 'codigo_resolucion', 'valor', 'tiempo_prestado', 'valor_fracion', 'usuarios_usuario_id'];

    public function parkings()
    {
        return $this->hasMany(Parking::class, 'factura_no_factura');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_usuario_id', 'usuario_id');
    }
}
