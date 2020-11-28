<?php

namespace App\Repositories;

/**
 * Query builder for sorting and filtering 
 * based on URL query parameters.
 **/
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

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
        $filters = ['nome', 'descricao', AllowedFilter::exact('valor'), AllowedFilter::exact('estoque')];
        return QueryBuilder::for(Product::class)
            ->allowedFilters($filters)
            ->defaultSort('nome')
            ->allowedSorts(['nome', 'descricao'])
            ->paginate(env('MAX_ITEMS_PER_PAGE', 15));
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
