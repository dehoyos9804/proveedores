<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|min:5|max:30',
           'apellido'=>'required|min:5|max:20',
           'correo'=>'required|email',
            'contraseña'=>'required|password|alpha_num|min:4',
        
        ];
    }
    public function attributes()
    {
     return [
         'nombre'=>'Nombres',
        'apellido'=>'Apellidos',
        'correo'=>'Correo',
        'contraseña'=>'Contraseña',
     ];
    }
    public function messages()
    {
     return [ 
     'nombre.required'=>'El Nombre es requerido',
     'apellido.required'=>'El Apellido es requerido',
     'correo.required'=>'El Correo es requerido',
     'contraseña.required'=>'La Contraseña es requerida', 
 
     'nombre.min'=>'El Nombre debe tener al menos 5 caracteres',
     'apellido.min'=>'El Apellido debe tener al menos 5 caracteres.',

     'correo.email'=>'El Email debe tener una dirección de correo electrónico.',

      'contraseña.alpha_num'=>'La Contraseña requiriere contener letras y  números',
    'contraseña.min'=>'El teléfono debe tener al menos más de 4 caracteres.',
       
    ];
    }
}
