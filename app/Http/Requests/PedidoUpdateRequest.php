<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_produto' => ['sometimes', 'required', 'min:3', 'max:200', 'unique:pedidos,nome_produto,' . $this->id],
            'valor' => ['required'],
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
            'nome_produto.max' => 'Nome do produto é excedeu de caracteres.',
            'nome_produto.min' => 'Nome do produto tem que ter pelo menos 5 caracteres',
            'nome_produto.exists' => 'Nome do produto já está cadastrado no sistema.',

            'valor.required' => 'Valor é obrigatório.',

            'data_vencimento.required' => 'Data de vencimento é obrigatório.',
            'data_vencimento.date' => 'Data de vencimento inválida.',
            'data_vencimento.after' => 'Data de vencimento não pode ser antes da data atual.',
        ];
    }
}
