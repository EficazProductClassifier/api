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
        return Product::paginate(env('MAX_ITEMS_PER_PAGE', 25));
    }

    /**
     * Gets a value for especific resource.
     *
     * @param string $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function get(string $resource_uuid){
        return Product::findOrFail($resource_uuid);
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
     * @param string $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function update(array $resource_data, string $resource_uuid){
        $product = Product::findOrFail($resource_uuid);
        $product->update($resource_data);
        return $product;
    }

    /**
     * Deletion logic.
     *
     * @param string $resource_uuid
     * @return mixed
     */
    function delete(string $resource_uuid){
        return Product::findOrFail($resource_uuid)->delete();    
    }
}
