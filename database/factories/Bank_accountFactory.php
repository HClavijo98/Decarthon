<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank_account>
 */
class Bank_accountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $numero_aleatorio = 'ES' . $this->faker->numerify('##############'); // Genera un número aleatorio de 18 dígitos y añade 'ES'
        return [
            'IBAN' => $numero_aleatorio,
            'money' => $this->faker->randomFloat(2, 0, 9999),
            'bank' => fake()->name(),
        ];
    }
}
