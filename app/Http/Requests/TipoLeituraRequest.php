<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class TipoLeituraRequest extends Request
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
            'unique' => 'Já existe um Tipo de Leitura com parâmetro igual!'
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
        'parametro' => 'required|unique:tipo_leitura',
        'unidade' => 'required'        
        ];
    }
}