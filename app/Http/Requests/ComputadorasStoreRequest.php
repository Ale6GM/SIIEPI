<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputadorasStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'ip' => 'unique:computadoras,ip',
            'trabajo'=>'required',
            'procesador'=>'required',
            'velocidad'=>'required',
            'almacenamiento' => 'required',
            'memoria'=>'required',
            'placa'=>'required'
        ];


    }

    public function messages():array
    {
        return [
            'ip.unique' => 'La Ip de la PC debe ser Unica',
            'trabajo.required'=>'El trabajo Realizado es Requerido',
            'procesador.required'=>'El procesador es Requerido',
            'velocidad.required'=>'La velocidad es Requerida',
            'almacenamiento.required' => 'El Almacenamiento es Requerido',
            'memoria.required'=>'La memoria es Requerida',
            'placa.required'=>'La Marca de la Motherboard es Requerida'
        ];
    }
}
