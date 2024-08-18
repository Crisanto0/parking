<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// app/Models/Usuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
        'tipo_identificacion',
        'numero_identificacion',
        'salario',
        'tipo_contrato',
        'rol_id',
        'horario',
        'usuario',
        'contrasena',
        'fecha_contrato',
        'fecha_terminacion',
    ];
    
    //...


    protected $hidden = [
        'contrasena',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setContrasenaAttribute($value)
    {
        $this->attributes['contrasena'] = bcrypt($value);
    }

}