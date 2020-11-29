<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFiltering extends TestCase
{
    use RefreshDatabase;

    /**
     * Creates a bunch of categories creates a
     * especific category and tries to filter against
     * that especific category with the url query 
     * parameters.
     * 
     * @test
     * @return void
     */
    public function test_filter_by_name_is_working()
    {
        $payload= ['nome' => 'Limpeza', 'descricao' => 'Utensílios de Limpeza'];
        Category::factory()->count(3)->create();
        Category::factory()->create($payload);
        $this->get('/api/category?filter[nome]=Limpeza')
             ->assertStatus(200)
             ->assertJson(['data' => [$payload]])
             ->assertJsonPath('meta.pagination.total', 1);
    }


    /**
     * Creates two categories and checks 
     * their position in relation to each other
     * in ascending order.
     * 
     * @test
     * @return void
     */
    public function test_sort_by_name_ascending_is_working()
    {
        $payloads = [
            ['nome' => 'aaaaa'],
            ['nome' => 'bbbbb']
        ];
        foreach($payloads as $payload) Category::factory()->create($payload);
        $this->get('/api/category?sort=nome')
            ->assertStatus(200)
            ->assertJson(["data" => [
                0 => [ "nome" => "aaaaa" ],
                1 => [ "nome" => "bbbbb" ]
            ]]);
    }

    /**
     * Creates two categories and checks 
     * their position in relation to each other
     * in descending order.
     * 
     * @test
     * @return void
     */
    public function test_sort_by_name_descending_is_working()
    {
        $payloads = [
            ['nome' => 'aaaaa'],
            ['nome' => 'bbbbb']
        ];
        foreach($payloads as $payload) Category::factory()->create($payload);
        $this->get('/api/category?sort=-nome')
            ->assertStatus(200)
            ->assertJson(["data" => [
                0 => [ "nome" => "bbbbb" ],
                1 => [ "nome" => "aaaaa" ]
            ]]);
    }
}

