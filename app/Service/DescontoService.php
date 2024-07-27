<?php

namespace App\Service;

use Exception;

class DescontoService
{
   /*
    * Realiza a validação do desconto.
    * O desconto não pode ser menor ou igual a zero,
    * nem igual ao valor do produto e o produto não pode estar vencido.
    */
    public static function validarDesconto($pedido, string $valorDesconto): void
    {
        if ($pedido->isVencido()) {
            throw new Exception('Produto vencido!');
        }

        $desconto = self::formatarValorParaFloat($valorDesconto);

        if ($desconto <= 0) {
            throw new Exception('Valor do desconto inválido!');
        }

        if ($desconto >= (float) $pedido->valor) {
            throw new Exception('Valor do desconto não pode ser maior ou igual que o valor do produto!');
        }
    }

    /*
    * Trata e calcula o valor do desconto
    */
    public static function aplicarDesconto($pedido, string $valorDesconto): float
    {
        $desconto = self::formatarValorParaFloat($valorDesconto);
        // dd((float) $pedido->valor - $desconto);
        return (float) $pedido->valor - $desconto;
    }

    /*
    * Formata um valor monetário para float
    */
    private static function formatarValorParaFloat(string $valor): float
    {
        $valorSemPontos = str_replace('.', '', $valor);
        $valorComPontoDecimal = str_replace(',', '.', $valorSemPontos);
        return (float) $valorComPontoDecimal;
    }
}
