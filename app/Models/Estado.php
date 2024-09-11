<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados'; // El nombre de tu tabla

    protected $fillable = ['descripcion'];

    public function garajes()
    {
        return $this->hasMany(Garaje::class, 'estado_id');
    }
}
