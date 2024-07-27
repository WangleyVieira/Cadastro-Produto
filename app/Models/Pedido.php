<?php

namespace App\Models;

use App\Utils\DataUtil;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto', 'valor', 'data_vencimento'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'pedidos';

    const VENCIDO = 1;
    const NAO_VENCIDO = 0;

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = str_replace(['.', ','], ['', '.'], $value);
    }

    public function valorFormatado()
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }

    public function dataFormatado()
    {
        return date('d/m/Y' , strtotime($this->data_vencimento));
    }

    public function isVencido()
    {
        return DataUtil::verificarDataAnteriorHoje($this->data_vencimento);
    }

    public function isValido()
    {
        return DataUtil::retornaDiferencaDataDias($this->data_vencimento) > 3;
    }

    public function isProximoVencer()
    {
        return !$this->isVencido() && !$this->isValido();
    }

    public function definirCorBadge()
    {
        $arrayCorStatus = [
            'cor' => 'secondary',
            'status' => ''
        ];

        if ($this->isVencido()) {
            $arrayCorStatus['cor'] = 'danger';
            $arrayCorStatus['status'] = 'Vencido';
        }
        if ($this->isValido()) {
            $arrayCorStatus['cor'] = 'success';
            $arrayCorStatus['status'] = 'Válido';
        }
        if($this->isProximoVencer()) {
            $arrayCorStatus['cor'] = 'warning';
            $arrayCorStatus['status'] = 'Próximo a vencer';
        }
        return $arrayCorStatus;
    }
}
