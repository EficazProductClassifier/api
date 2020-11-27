<?php

namespace App\Repositories;

use App\Contracts\ICategoryRepository;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository 
{
   /**
     * Gets all the values for a given resource. 
     *
     * @return mixed
     */
    function all(){
        return Category::paginate(env('MAX_ITEMS_PER_PAGE', 25));
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
        dd($category);
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
