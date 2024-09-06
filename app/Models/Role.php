<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable=[
        'rol_id'
    ];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_id');
    }
}
