<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // definiendo las características que tendrá el valor
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(28),
            'imagen' => $this->faker->uuid().'.jpg',
            // toma un número de los que definimos
            'user_id' => $this->faker->randomElement([1,5])
        ];
    }
}
