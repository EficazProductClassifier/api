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
}

