<?php

namespace App\Repositories;

use App\Contracts\IProductRepository;
use App\Models\Product;

class ProductRepository implements IProductRepository 
{
   /**
     * Gets all the values for a given resource. 
     *
     * @return mixed
     */
    function all(){
        return Product::all()->paginate(env('MAX_ITEMS_PER_PAGE', 25));
    }

    /**
     * Gets a value for especific resource.
     *
     * @param int $resource_id
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function get(int $resource_id){
        return Product::findOrFail($resource_id);
    }

    /**
     * Storing logic for the resource.
     *
     * @param array $resource_data
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function store(array $resource_data){
        return Product::create($resource_data);

    }

    /**
     * Updating logic.
     *
     * @param array $resource_data
     * @param int   $resource_id
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function update(array $resource_data, int $resource_id){

    }

    /**
     * Deletion logic.
     *
     * @param int $resource_id
     * @return mixed
     */
    function delete(int $resource_id){
    
    }
}
