<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

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

    protected $hidden = [
        'contrasena',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con la tabla roles
    public function rol()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    // Mutador para encriptar la contraseña
    public function setContrasenaAttribute($value)
    {
        $this->attributes['contrasena'] = bcrypt($value);
    }

    // Cambiar el nombre de la columna 'password' a 'contrasena' para la autenticación
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'usuarios_usuario_id', 'usuario_id');
    }
    
    
}
