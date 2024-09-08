<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes agregar lógica para autorizar la solicitud
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|digits:10|numeric',
            'direccion' => 'nullable|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
            'tipo_vehiculo' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'marca' => 'required|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'telefono.numeric' => 'El teléfono solo puede contener números.',
            'placa.max' => 'La placa no debe exceder los 10 caracteres.',
            'required' => 'El campo :attribute es obligatorio.',
            'email.email' => 'El campo :attribute debe ser un correo electrónico válido.',
        ];
    }
}

