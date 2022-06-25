<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'dni' => 'required|unique:pacientes,dni',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required|before_or_equal:start_date',
            'drop-sexo' => 'required',
            'drop-obras' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'dni.unique' => 'Error, Ya existe un paciente con ese DNI',
            'dni.required' => 'Error, debe ingresar un DNI',
            'telefono.required' => 'Error, debe ingresar un Telefono',
            'fecha_nacimiento.required' => 'Error, debe ingresar una fecha',
            'fecha_nacimiento.before_or_equal' => 'Error, no puede ingresar fechas futuras',
            'drop-sexo.required' => 'Error, debe elegir el sexo del paciente',
            'drop-obras.required' => 'Error, debe ingresar una obra social'
        ];
    }
}
