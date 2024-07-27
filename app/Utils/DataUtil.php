<?php

namespace App\Utils;

use Carbon\Carbon;
use DateTime;

class DataUtil
{
    public static function verificarDataAnteriorHoje($data)
    {
        $hoje = Carbon::now()->format('Y-m-d');
        $hoje = Carbon::createFromFormat('Y-m-d', $hoje);
        $dataVencimento = Carbon::createFromFormat('Y-m-d', $data);
        return $hoje->greaterThan($dataVencimento);
    }

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
