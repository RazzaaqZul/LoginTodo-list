<?php

namespace App\Providers;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    // Singleton properties
    // Interface dan implementasi
    public array $singletons = [
        TodolistService::class =>TodolistServiceImpl::class
    ];

    // Override method DeferabbleProvider
    public function provides() : array
    {
      // beri tahu bahwa ini adalah services provider untuk
      return [TodolistService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
