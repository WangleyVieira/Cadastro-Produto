<?php

namespace App\Models;

use App\Utils\DataUtil;
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
        return DataUtil::varificarProdutoValido($this->data_vencimento);
    }

    public function isProximoVencer()
    {
        return !$this->isVencido() && !$this->isValido();
    }

    /**
     * Retorna array com cores e status e verifica as condições do pedido
     */
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
