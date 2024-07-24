<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prato>
 */
class PratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => $this->faker->name(),
            "descricao" => $this->faker->text(),
            "Disponibilidade" => $this->faker->word(),
            // "imagem" => $this->faker->word(),
            "preco" => $this->faker->randomFloat(2, 0, 99999999.99),
            "user_id" => User::all()->random()->id,
        ];
    }
}
