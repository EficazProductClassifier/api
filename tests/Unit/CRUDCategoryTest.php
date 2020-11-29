<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUDCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Checks if the CategoryController@index 
     * is listing all the values. 
     *
     * @test
     * @return void
     */
    public function test_check_if_index_method_in_category_controller_is_listing_all_the_values()
    {
        $rows = rand(1, 5);
        Category::factory()->count($rows)->create();

        $this->get('api/category')
             ->assertStatus(200)
             ->assertJsonPath('meta.pagination.total', $rows);
    }

    /**
     * Checks if the CategoryController@store
     * method is storing in the database properly.
     *
     * @test
     * @return void
     */
    public function test_check_if_store_method_in_category_controller_is_storing_the_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows)->create();

        $categoryBeingAdded = Category::factory()->make()->toArray();

        $this->post('api/category', $categoryBeingAdded)
             ->assertStatus(201);

        $this->get('api/category')
             ->assertStatus(200)
             ->assertJsonPath('meta.pagination.total', ($rows + 1));
    }

    /**
     * Checks if the CategoryController@show
     * method is showing the desired resource.
     *
     * @test
     * @return void
     */
    public function test_check_if_show_method_in_category_controller_is_showing_desired_resource(){
        $rows = rand(1, 5);
        Category::factory()->count($rows)->create();
        
        $random_id_from_new_categories = Category::inRandomOrder()
            ->limit(1)
            ->get()
            ->toArray()[0]['id'];

        $this->get('api/category/' . $random_id_from_new_categories)
             ->assertStatus(200);
    }


}
