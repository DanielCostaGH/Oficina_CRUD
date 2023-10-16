<?php

namespace Database\Factories;

use App\Models\Orcamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Fábrica para criar dados baseados no modelo Orcamento.
 */
class OrcamentoFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente' => $this->faker->name,
            'titulo' => $this->faker->sentence,
            'data' => $this->faker->date,
            'hora' => $this->faker->time,
            'vendedor' => $this->faker->name,
            'descricao' => $this->faker->paragraph,
            'valor' => $this->faker->randomFloat(2, 1, 1000),
            'email' => $this->faker->unique()->safeEmail,
            'fone' => $this->faker->phoneNumber,
        ];
    }
}
