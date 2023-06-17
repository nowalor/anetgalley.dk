<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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
            'has_additional_info' => true,
            'dimensions' => '0.3',
            'weight' => '5kg',
            'material' => 'gold',
            'quantity' => $categoryId === 1 ? 1 : rand(1, 20),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function(Product $product) {
            $product->image_url = $this->faker->image(storage_path("product-images/$product->id/", 640, 480));
            $product->save();
        });
    }
}
