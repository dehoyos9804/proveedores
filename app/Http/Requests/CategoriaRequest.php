<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nombre'=>'required|min:5|max:30|alpha_spaces|uppercase',
        ];
    }
    public function attributes()
    {
     return [
         'nombre'=>'Nombres',
     ];
    }
    public function messages()
    {
     return [ 
     'nombre.required'=>'El Nombre es requerido',
     
 
     'nombre.min'=>'El Nombre debe tener al menos 5 caracteres',
     'nombre.alpha_spaces'=>'El Nombre solo puede contener letras y espacios.',
     'nombre.uppercase'=>'El Nombre debe tener alguna letra en mayúscula',
       
    ];
    }

}
