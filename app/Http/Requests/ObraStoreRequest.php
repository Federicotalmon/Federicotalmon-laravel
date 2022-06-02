<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraStoreRequest extends FormRequest
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
            'cuit' => 'unique:obras_sociales| required',
            'nombre' => 'unique:obras_sociales| required'
        ];
    }

    public function messages()
    {
        return [
        'cuit.unique' => 'Error, ya existe una obra social con el cuit ingresado.',
        'cuit.required' => 'Error, debes completar el campo "cuit".',
        'nombre.unique' => 'Error, ya existe una obra social con ese nombre".',
        'nombre.required' => 'Error, debes completar el campo "nombre".',
        ];
    }
}
