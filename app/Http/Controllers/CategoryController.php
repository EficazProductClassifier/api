<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ICategoryRepository;
use App\Transformers\CategoryTransformer;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Repository instance for model management.
     */
    protected $repository;

    public function __construct(ICategoryRepository $repository)
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
        $categories = $this->repository->all();
        return $this->response->paginator($categories, new CategoryTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->repository->store($request->validated());
        return $this->response->item($category, new CategoryTransformer)->statusCode(201);
    }
    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return \Dingo\Api\Http\Response
     */
    public function show(string $uuid)
    {
        $category = $this->repository->get($uuid); 
        return $this->response->item($category, new CategoryTransformer);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $uuid
     * @return \Dingo\Api\Http\Response
     */
    public function update(UpdateCategoryRequest $request, string $uuid)
    {
        $category = $this->repository->update($request->validated(), $uuid);
        return $this->response->item($category, new CategoryTransformer);
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
