<?php

namespace App\Utils;

use Carbon\Carbon;
use DateTime;

class DataUtil
{
    /*
    * Realiza a formatação das datas de hoje e vencimento
    * Retorna se a data de hoje form maior ou posterior da data de vencimento
    */
    public static function verificarDataAnteriorHoje($data)
    {
        $hoje = Carbon::now()->format('Y-m-d');
        $hoje = Carbon::createFromFormat('Y-m-d', $hoje);
        $dataVencimento = Carbon::createFromFormat('Y-m-d', $data);
        return $hoje->greaterThan($dataVencimento);
    }

    /*
     * Verifica se a data de vencimento está 3 ou mais a data de hoje
     */
    public static function varificarProdutoValido($data)
    {
        $hoje = Carbon::now()->format('Y-m-d');
        $hoje = Carbon::createFromFormat('Y-m-d', $hoje);
        $dataVencimento = Carbon::createFromFormat('Y-m-d', $data);
        $diferencaDias = $dataVencimento->diffInDays($hoje);

        if ($dataVencimento->isFuture()) {
            return $diferencaDias > 3;
        }
        return false;
    }
}
