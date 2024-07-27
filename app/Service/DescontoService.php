<?php

namespace App\Service;

use Exception;

class DescontoService
{
    public static function validarDesconto($pedido, $valorDesconto)
    {
        if ($pedido->isVencido()) {
            throw new Exception('Produto vencido!');
        }
        $converterValorDesconto = str_replace('.', '', $valorDesconto);
        $converterValorDescontoFloat = (float)$converterValorDesconto;

        if ($converterValorDescontoFloat <= 0) {
            throw new Exception('Valor do desconto inválido!');
        }
        if ($converterValorDescontoFloat >= $pedido->valor) {
            throw new Exception('Valor do desconto não pode ser maior que o valor do produto!');
        }
    }
    public static function aplicarDesconto($pedido, $valorDesconto)
    {
        $converterValorDesconto = str_replace(',', '.', $valorDesconto);
        return $pedido->valor - $converterValorDesconto;
    }
}
