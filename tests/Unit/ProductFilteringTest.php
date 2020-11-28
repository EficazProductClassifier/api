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
}
