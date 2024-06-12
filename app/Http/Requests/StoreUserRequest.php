<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El Nombre de Usuario es Requerido',
            'name.string' => 'El Nombre solo puede Contener Texto',
            'email.required' => 'El Email es Requerido',
            'email.string' => 'El Email solo puede Contener Texto',
            'email.unique' => 'El Email debe ser Unico',
            'password.required' => 'La contraseña es Requerida',
            'password.min' => 'La Longitud Minima de una contraseña es de 8 Caracteres',
            'password.confirmed' => 'La contraseña debe ser Confirmada'
        ];
    }
}
