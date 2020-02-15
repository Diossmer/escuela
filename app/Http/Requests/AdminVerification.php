<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminVerification extends FormRequest
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
            'seg_nombre'=>'',
            'apellido'=>'required',
            'seg_apellido'=>'',
            'fecha'=>'required',
            'nacionalidad'=>'required',
            'localidad'=>'required',
            'direccion'=>'',
            'telefono'=>'required|min:+0 02120000000|max:+99 04269999999',
            'email'=>'required',
            'role'=>'required',
            'password'=>'required',
        ];
    }
}
