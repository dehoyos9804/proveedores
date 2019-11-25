<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'descripcion'=>'required|min:5|max:500|alpha_spaces',
            'categoria_id'=>'required|numeric',
        ];
    }
    public function attributes()
    {
     return [
         'nombre'=>'Nombres',
         'descripcion'=>'Descripcion',
         'categoria_id'=>'Categoria',
     ];
    }
    public function messages()
    {
     return [ 
     'nombre.required'=>'El Nombre es requerido',
     'descripcion.required'=>'La  Descripcion es requerida',
     'categoria_id.required'=>'La Categoria del producto es requerido',
 
     'nombre.min'=>'El Nombre debe tener al menos 5 caracteres',
     'nombre.alpha_spaces'=>'El Nombre solo puede contener letras y espacios.',
     'nombre.uppercase'=>'El Nombre debe tener alguna letra en mayúscula',
     'descripcion.min'=>'La Descripcion debe tener al menos 5 caracteres.',
     'descripcion.alpha_spaces'=>'La  Descripcion solo puede contener letras y espacios.',
     'categoria_id'=>'La Categoria del producto requiriere ser numérico',
    ];
    }
}
