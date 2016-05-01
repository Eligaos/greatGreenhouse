<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CulturaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'nome' => 'required|min:2|unique:users',
        'data_inicio_ciclo' => 'date_format:date|unique:users',
        'data_prevista_fim_ciclo' => 'date_format:date|after:data_inicio_ciclo'
        ];
    }
}
