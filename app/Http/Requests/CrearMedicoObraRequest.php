<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CrearMedicoObraRequest extends FormRequest
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
            'drop-obras' => ['required'],
        ];
    }

    public function messages()
    {
        return[
        'drop-obras.required' => 'Error, no selecciono ninguna una obra social',
        ];
    }
}
