<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name'     => 'required|min:4|max:40',
            'email'     => 'required|email|max:55|unique:users,email',
            'password'     => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Informe um nome.',
            'name.min'              => 'Mínimo de :min caracteres permitido.',
            'name.max'              => 'Máximo de :max caracteres permitido.',
            'email.required'        => 'Informe um email.',
            'email.email'           => 'Informe um endereço de e-mail válido.',
            'email.max'             => 'Seu e-mail parece grande demais...',
            'email.unique'          => 'O e-mail informado já está em uso.',
            'password.required'      => 'Informe uma senha.',
            'password.confirmed'    => 'A confirmãção de senha não confere.'
            
        ];
    }
}
