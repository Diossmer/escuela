<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoValidation extends FormRequest
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
            //
            'nombre'=>'required',
            'apellido'=>'required',
            'lugar_nacimiento'=>'required',
            'direccion'=>'required',
            'fecha'=>'required',
            'sexo'=>'required',
            'camisa'=>'required',
            'pantalon'=>'required',
            'zapato'=>'required',
            'fotos'=>'required',
            'representante_id'=>'required',
        ];
    }
}
