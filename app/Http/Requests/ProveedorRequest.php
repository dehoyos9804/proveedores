<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
           'direccion'=>'required|alpha_num',
           'contacto'=>'required',
        'telefono'=>'required|min:4|numeric',
        'pagina_web'=>'required|url',
        ];
    }
    public function attributes()
    {
     return [
         'nombre'=>'Nombres',
        'direccion'=>'Direccion',
        'contacto'=>'Direccion',
        'telefono'=>'Telefono',
        'pagina_web'=>'Pagina Web',
     ];
    }
    public function messages()
    {
     return [ 
     'nombre.required'=>'El Nombre es requerido',
     'direccion.required'=>'La Direccion es requerida',
     'contacto.required'=>'El contacto es requerido',
     'telefono.required'=>'El Telefono es requerido', 
     'pagina_web.required'=>'La Pagina Web es requerida',
 

     'nombre.min'=>'El Nombre debe tener al menos 5 caracteres',
     'nombre.alpha_spaces'=>'El Nombre solo puede contener letras y espacios.',
     'nombre.uppercase'=>'El Nombre debe tener alguna letra en mayúscula',

     'direccion.alpha_num'=>'La Dirección solo puede contener  letras y números.',

     'contacto.min'=>'debe tener al menos más de 4 caracteres',

      'telefono.numeric'=>'El Telefono requiriere ser numérico',
      'telefono.min'=>'El teléfono debe tener al menos más de 4 caracteres.',

    'pagina_web.url'=>'La pagina web debe tener direccion url',
       
    ];
    }

}
