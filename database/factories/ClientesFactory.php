<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // defino todos los campos que tine la tabla
            'nombre' => fake()->name(),
            'apellido' => fake()->name(),
            'dni' => fake()->numberBetween($int1 = 11111111, $int2 = 2147483647),
            'telefono' => fake()->numberBetween($int1 = 351327652, $int2 = 351988877),
            'domicilio' => $this->faker->words(5, true),
            'patente' => $this->faker->randomElement(['ABC123', 'AB123CD'])
        ];
    }
}
