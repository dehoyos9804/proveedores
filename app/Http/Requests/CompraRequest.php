<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'fecha'=>'required|date',
            'descripcion'=>'required|min:5|max:500',
            'proveedor_id'=>'required|numeric',
        ];
    }
    public function attributes()
    {
     return [
         'fecha'=>'Fecha',
        'descripcion'=>'Descripcion',
        'proveedor_id'=>'Proveedor',
     ];
    }
    public function messages()
    {
     return [ 
     'fecha.required'=>'La Fecha es requerida',
     'descripcion.required'=>'La  Descripcion es requerida',
     'proveedor_id.required'=>'El Proveedor de la Compra es requerido',
    
     'descripcion.min'=>'La Descripcion debe tener al menos 5 caracteres.',
     'proveedor_id'=>'El Proveedor de la Compra requiriere ser numérico',
       
    ];
    }
}
