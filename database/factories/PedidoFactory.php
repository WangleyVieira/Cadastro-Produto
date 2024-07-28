<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    //Gera valores aleatório para persistir no Banco
    public function definition()
    {
        return [
            'nome_produto' => $this->faker->word(7, true),
            'valor' => $this->faker->randomFloat(2, 1, 30),
            'data_vencimento' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
