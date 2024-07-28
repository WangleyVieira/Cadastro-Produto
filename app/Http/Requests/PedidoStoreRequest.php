<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_produto' => ['required', 'min:3', 'max:200', 'unique:pedidos,nome_produto'],
            'valor' => ['required', 'regex:/^(?!0+(,0{1,2})?$)(?!0+$)\d{1,3}(\.\d{3})*,\d{2}$/'],
            'data_vencimento' => ['date', 'required', 'after:today'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome_produto.required' => 'Nome do produto é obrigatório.',
            'nome_produto.max' => 'Nome do produto é excedeu 200 de caracteres',
            'nome_produto.min' => 'Nome do produto tem que ter pelo menos 5 caracteres',
            'nome_produto.unique' => 'Nome do produto já está cadastrado no sistema.',

            'valor.required' => 'Valor é obrigatório.',
            'valor.regex' => 'O valor não pode ser zero.',

            'data_vencimento.required' => 'Data de vencimento é obrigatório.',
            'data_vencimento.date' => 'Data de vencimento inválida.',
            'data_vencimento.after' => 'Data de vencimento não pode ser antes da data atual.',
        ];
    }
}
