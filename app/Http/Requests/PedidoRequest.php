<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_produto' => 'required|max:200|unique:pedidos,nome_produto',
            'valor' => 'required',
            'data_vencimento' => 'date|required',
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
            'nome_produto.max' => 'Nome do produto é excedeu de caracteres.',
            'nome_produto.unique' => 'Nome do produto já está cadastrado no sistema.',

            'valor.required' => 'Valor é obrigatório.',

            'data_vencimento.required' => 'Data de vencimento é obrigatório.',
            'data_vencimento.date' => 'Data de vencimento inválida.',
        ];
    }
}
