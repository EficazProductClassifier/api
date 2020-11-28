<?php

namespace App\Repositories;

/**
 * Query builder for sorting and filtering 
 * based on URL query parameters.
 **/
use Spatie\QueryBuilder\QueryBuilder;

use App\Contracts\ICategoryRepository;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository 
{
    /**
     * Gets all the values for a given resource
     * and filter based on the query parameters. 
     *
     * @return mixed
     */
    function all(){
        return QueryBuilder::for(Category::class)
            ->allowedFilters(['nome', 'descricao'])
            ->defaultSort('nome')
            ->allowedSorts(['nome', 'descricao'])
            ->paginate(env('MAX_ITEMS_PER_PAGE', 15));
    }

    /**
     * Gets a value for especific resource.
     *
     * @param int $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function get(string $resource_uuid){
        return Category::findOrFail($resource_uuid);

    }

    /**
     * Storing logic for the resource.
     *
     * @param array $resource_data
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function store(array $resource_data){
        return Category::create($resource_data);
    }

    /**
     * Updating logic.
     *
     * @param array $resource_data
     * @param string $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function update(array $resource_data, string $resource_uuid){
        $category = Category::findOrFail($resource_uuid);
        $category->update($resource_data);
        return $category;
    }

    /**
     * Deletion logic.
     *
     * @param string $resource_uuid
     * @return mixed
     */
    function delete(string $resource_uuid){
        return Category::findOrFail($resource_uuid)->delete();
    }
}
