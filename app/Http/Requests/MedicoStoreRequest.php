<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoStoreRequest extends FormRequest
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
            'matricula' => 'required|unique:medicos,matricula',
            'nombre' => 'required',
            'especialidad' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'matricula.unique' => 'Error, ya existe un medico con esa matricula.',
            'matricula.required' => 'Error, falta completar el campo "matricula"',
            'nombre.required' => 'Error, falta completar el campo "nombre"',
            'especialidad.required' => 'Error, falta completar el campo "especialidad"'
        ];
    }
}
