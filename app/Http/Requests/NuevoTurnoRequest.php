<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NuevoTurnoRequest extends FormRequest
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
            'fecha'=> ['required','date_format:Y-m-d\TH:i','after:tomorrow',
             Rule::unique('turnos')
             ->where('matricula_medico', $this->matricula_medico)
            ]
        ];
    }

    public function messages()
    {
        return [
            'detalles.required' => 'Error, debes ingresar detalles.',
            'fecha.required' => 'Error, debes ingresar una fecha.',
            'fecha.after' => 'Error, solo se puede agregar turnos para dias siguientes a hoy.',
        ];
    }
}
