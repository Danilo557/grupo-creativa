<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'high' => $this->faker->numberBetween(20, 50),
            'width' => $this->faker->numberBetween(40, 60),
            'price' => $this->faker->randomNumber(5, false),
            'unit_id' => Unit::all()->random()->id
        ];
    }
}
