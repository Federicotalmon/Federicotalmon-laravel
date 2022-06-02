<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EditarTurnoRequest extends FormRequest
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
             'detalles'=> 'required',
             'fecha'=> ['required','date_format:Y-m-d\TH:i',
              Rule::unique('turnos')
              ->where('matricula_medico', $this->matricula_medico)
              ->ignore($this->id),
             ]
         ];
     }

     public function messages()
     {
         return [
             'detalles.required' => 'Error, debes ingresar detalles.',
             'fecha.required' => 'Error, debes ingresar una fecha.',
             'fecha.unique' => 'Error, ya existe un turno en esa fecha.',
         ];
     }
}
