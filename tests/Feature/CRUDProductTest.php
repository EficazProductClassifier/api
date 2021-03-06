<?php

namespace Tests\Feature;

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

        $this->assertDatabaseCount('products', $rows+1);
    }

    /**
     * Checks if the ProductController@show
     * method is showing the desired resource.
     *
     * @test
     * @return void
     */
    public function test_check_if_show_method_in_product_controller_is_showing_desired_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows * 2)->create();
        Product::factory()->count($rows)->create();
        
        $random_id_from_new_products = Product::inRandomOrder()
            ->limit(1)
            ->get()
            ->toArray()[0]['id'];

        $this->get('api/product/' . $random_id_from_new_products)
             ->assertStatus(200);
    }

    /**
     * Checks if the ProductController@update
     * method is updating the desired resource.
     *
     * @test
     * @return void
     */
    public function test_check_if_update_method_in_product_controller_is_updating_desired_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows * 2)->create();
        Product::factory()->count($rows)->create();
        
        $random_id_from_new_products = Product::inRandomOrder()
            ->limit(1)
            ->get()
            ->toArray()[0]['id'];

        $updateTo = ['nome' => 'BestUpdateEver', 'descricao' => 'Update for the category', 'valor' => rand(0,5), 'estoque' => rand(0,5)];
        $this->put('api/product/' . $random_id_from_new_products, $updateTo)
             ->assertStatus(200);
    }

    /**
     * Checks if the ProductController@delete
     * method is deleting the desired resource.
     *
     * @test
     * @return void
     */
    public function test_check_if_delete_method_in_product_controller_is_deleting_desired_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows * 2)->create();
        Product::factory()->count($rows)->create();
        
        $random_id_from_new_products = Product::inRandomOrder()
            ->limit(1)
            ->get()
            ->toArray()[0]['id'];


        $result = $this->delete('api/product/' . $random_id_from_new_products)
             ->assertStatus(202);
        $this->assertDeleted('products', ['id' => $random_id_from_new_products]);
    }


}
