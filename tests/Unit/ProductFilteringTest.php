<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductFiltering extends TestCase
{
    use RefreshDatabase;

    /**
     * creates a category to rule into 
     * the product bunch of products, creates a
     * especific product and tries to filter against
     * that especific product with the url query 
     * parameters.
     * 
     * @test
     * @return void
     */
    public function test_filter_by_name_is_working()
    {
        Category::factory()->count(1)->create();
        $payload= ['nome' => 'Detergente', 'descricao' => 'Um utensilio de limpeza', 'valor' => 2, 'estoque' => 10];
        Product::factory()->count(3)->create();
        Product::factory()->create($payload);
        $this->get('/api/product?filter[nome]=Detergente')
                       ->assertStatus(200)
                       ->assertJson(['data' => [$payload]])
                       ->assertJsonPath('meta.pagination.total', 1);
    }

    /**
     * Creates two products and checks 
     * their position in relation to each other
     * in ascending order.
     * 
     * @test
     * @return void
     */
    public function test_sort_by_name_ascending_is_working()
    {
        Category::factory()->count(1)->create();
        $payloads = [
            ['nome' => 'aaaaa'],
            ['nome' => 'bbbbb']
        ];
        foreach($payloads as $payload) Product::factory()->create($payload);
        $this->get('/api/product?sort=nome')
            ->assertStatus(200)
            ->assertJson(["data" => [
                0 => [ "nome" => "aaaaa" ],
                1 => [ "nome" => "bbbbb" ]
            ]]);
    }

    /**
     * Creates two products and checks 
     * their position in relation to each other
     * in descending order.
     * 
     * @test
     * @return void
     */
    public function test_sort_by_name_descending_is_working()
    {
        Category::factory()->count(1)->create();
        $payloads = [
            ['nome' => 'aaaaa'],
            ['nome' => 'bbbbb']
        ];
        foreach($payloads as $payload) Product::factory()->create($payload);
        $this->get('/api/product?sort=-nome')
            ->assertStatus(200)
            ->assertJson(["data" => [
                0 => [ "nome" => "bbbbb" ],
                1 => [ "nome" => "aaaaa" ]
            ]]);
    }

}
