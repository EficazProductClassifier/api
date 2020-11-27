<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->sentence(3),
            'valor' => $this->faker->randomFloat(2, 1, 100),
            'estoque' => $this->faker->numberBetween(0, 10),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id // gets a random uuid
        ];
    }
}
