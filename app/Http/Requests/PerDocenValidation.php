<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerDocenValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'periodo_desde'=>'required|min:01-01-2018|date',
            'periodo_hasta'=>'required|min:01-01-2018|date',
            'fecha_inicio'=>'required',
            'estatus'=>'required',
            'docente_id'=>'required',
        ];
    }
}
