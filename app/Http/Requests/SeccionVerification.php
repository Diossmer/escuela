<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeccionVerification extends FormRequest
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
            "descripcion"=>"required",
            "grado"=>"required|min:0|max:6",
            "cupo"=>"required|min:0|max:30",
            "periodo_id"=>"required"
        ];
    }
}
