<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TurnosPacienteRequest extends FormRequest
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
            'dni' => 'exists:turnos,dni_paciente'
            
        ];
    }


    public function messages()
    {
        return [
            'dni.exists' => 'No existen turnos relacionados con ese DNI.'
        ];
    }
}
