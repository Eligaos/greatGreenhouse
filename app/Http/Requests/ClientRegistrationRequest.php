<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientRegistrationRequest extends Request
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

    public function messages()
    {
        return [
            'password_confirmation.same' => 'A palavra-passe e a sua confirmação devem ser iguais.',
            'password.min' => 'A palavra-passe deve ter no mínimo :min caracteres.',
            'cellphone.digits' => 'O nº de telemóvel tem de ter :digits digitos.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|unique:users',
            'email' => 'required|email|unique:users',
           'cellphone' => 'digits:9|unique:users',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
