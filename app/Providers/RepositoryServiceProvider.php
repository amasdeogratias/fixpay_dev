<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\{
    CategoryContract, BrandContract,AttributeContract, ProductContract,OrderContract
};
use App\Repositories\{
    CategoryRepository,BrandRepository,AttributeRepository, ProductRepository,OrderRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class      =>     CategoryRepository::class,
        BrandContract::class         =>     BrandRepository::class,
        AttributeContract::class     =>     AttributeRepository::class,
        ProductContract::class       =>     ProductRepository::class,
        OrderContract::class         =>     OrderRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
