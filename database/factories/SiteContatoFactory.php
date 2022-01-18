<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteContatoFactory extends Factory
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
            'telefone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->safeEmail(),
            'motivo_contato' => $this->faker->numberBetween(1,3),
            'mensagem' =>$this->faker->text(200),
        ];
    }
}
