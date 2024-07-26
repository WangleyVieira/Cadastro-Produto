<?php

namespace App\Models;

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
}
