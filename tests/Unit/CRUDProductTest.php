<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Transformers\ProductTransformer;

class CRUDProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Checks if the ProductController@index 
     * is listing all the values. 
     *
     * @test
     * @return void
     */
    public function test_check_if_index_method_in_product_controller_is_listing_all_the_values()
    {
        $rows = rand(1, 5);
        Category::factory()->count(1)->create();
        Product::factory()->count($rows)->create();

        $this->get('api/product')
             ->assertStatus(200)
             ->assertJsonPath('meta.pagination.total', $rows);
    }

    /**
     * Checks if the ProductController@store
     * method is storing in the database properly.
     *
     * @test
     * @return void
     */
    public function test_check_if_store_method_in_product_controller_is_storing_the_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows * 2)->create();
        Product::factory()->count($rows)->create();

        $productBeingAdded = Product::factory()->make()->toArray();

        $this->post('api/product', $productBeingAdded)
             ->assertStatus(201);

        $this->get('api/product')
             ->assertStatus(200)
             ->assertJsonPath('meta.pagination.total', ($rows + 1));
    }
}