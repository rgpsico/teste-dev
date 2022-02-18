<?php

namespace Modules\Books\Providers;

use Dotenv\Repository\RepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Modules\Books\Repository\BookRepository;
use Modules\Books\Repository\Contract\BookRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(
            BookRepositoryInterface::class,
            BookRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
