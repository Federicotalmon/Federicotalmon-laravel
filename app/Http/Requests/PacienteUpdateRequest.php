<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteUpdateRequest extends FormRequest
{
 /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'drop-sexo' => 'required',
            'drop-obras' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'telefono.required' => 'Error, debe ingresar un Telefono',
            'fecha_nacimiento.required' => 'Error, debe ingresar una fecha',
            'drop-sexo.required' => 'Error, debe elegir el sexo del paciente',
            'drop-obras.required' => 'Error, debe ingresar una obra social'
        ];
    }
}
