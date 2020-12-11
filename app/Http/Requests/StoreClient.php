<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'name' => 'max:50|required',
            'galc' => 'max:50|required',
            'port' => 'integer|nullable',
            'instalation_address' => 'required|max:100',
            'speed' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'galc' => 'Galc',
            'port' => 'Porta',
            'instalation_address' => 'Endereço de instalação',
            'speed' => 'Velocidade'
        ];
    }
}
