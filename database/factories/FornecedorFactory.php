<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'site' => $this->faker->name().'.com.br',
            'uf' => $this->faker->stateAbbr(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
