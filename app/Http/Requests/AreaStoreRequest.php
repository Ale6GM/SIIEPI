<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaStoreRequest extends FormRequest
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
            'descripcion' => 'required|unique:areas,descripcion'
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'El Campo descripción es Obligatorio',
            'descripcion.unique' => 'Las Areas no Deben estar Duplicadas',
        ];
    }
}
