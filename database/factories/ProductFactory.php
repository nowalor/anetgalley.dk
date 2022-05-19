<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryId = rand(1,2);

        return [
            'category_id' => rand(1,2),
            'name' => $this->faker->firstName(),
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->text(500),
            'image_url' => 'product' .  rand(1,4) . 'jpg',
            'has_additional_info' => true,
            'dimensions' => '0.3',
            'weight' => '5kg',
            'material' => 'gold',
            'condition' => 'amazing',
            'quantity' => $categoryId === 1 ? 1 : rand(1, 20),
        ];
    }
}
