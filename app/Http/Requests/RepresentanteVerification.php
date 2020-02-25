<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentanteVerification extends FormRequest
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
            'apellido'=>'',
            'cedula'=>'required',
            'email'=>'required',
            'fecha_nacimiento'=>'required',
            'trabajo'=>'required',
            'grado_instruccion'=>'required',
            'profesion_ocupacion'=>'required',
            'lugar_trabajo'=>'required',
            'telefono'=>'required',
            'sexo'=>'required',
        ];
    }
}
