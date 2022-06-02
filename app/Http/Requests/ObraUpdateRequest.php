<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ObraUpdateRequest extends FormRequest
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
            'nombre' => ['required',Rule::unique('obras_sociales','nombre')->ignore($this->id,'cuit')]
            ];
    }

    public function messages()
    {
        return [
        'nombre.unique' => 'Error, ya existe una obra social con ese nombre.',
        'nombre.required' => 'Error, debes completar el campo "nombre.',
        ];
    }

}
