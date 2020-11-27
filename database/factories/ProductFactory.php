<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->text(),
            'valor' => $this->faker->randomFloat(2),
            'estoque' => $this->faker->numberBetween(0, 10),
            'category_id' => $this->faker->numberBetween(0, App\Models\Product::count())
            
        ];
    }
}
