<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class      =>     CategoryRepository::class,
        BrandContract::class         =>     BrandRepository::class,
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
