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
        'nome' => 'required|min:2|unique:culturas',
        'data_inicio_ciclo' => 'date_format:Y-m-d|required',
        'data_prevista_fim_ciclo' => 'date_format:Y-m-d|after:data_inicio_ciclo',
        'duracao_ciclo' => 'min:0',
        'espaco_na_linha' => 'min:0',
        'espaco_entre_linhas' => 'min:0'
        ];
    }
}