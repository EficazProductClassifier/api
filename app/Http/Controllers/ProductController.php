<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Contracts 
use App\Contracts\IProductRepository;

// Transformers
use App\Transformers\ProductTransformer;

// Requests
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Repository instance for model management.
     */
    protected $repository;

    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * [GET] Display a listing of the resource.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $products = $this->repository->all();
        return $this->response->paginator($products, new ProductTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->repository->store($request->all());
        return $this->response->item($product, new ProductTransformer)->statusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return \Dingo\Api\Http\Response
     */
    public function show(string $uuid)
    {
        $product = $this->repository->get($uuid); 
        return $this->response->item($product, new ProductTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest $request
     * @param  string $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(UpdateProductRequest $request, string $uuid)
    {
        $product = $this->repository->update($request->all(), $uuid);
        return $this->response->item($product, new ProductTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $uuid
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(string $uuid)
    {
        $this->repository->delete($uuid);
        return $this->response->accepted(null, ['message' => 'Entity deleted', 'status_code' => 202]);
    }
}
