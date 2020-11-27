<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\ICategoryRepository',
            'App\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Contracts\IProductRepository',
            'App\Repositories\ProductRepository'
        );
    }
}
