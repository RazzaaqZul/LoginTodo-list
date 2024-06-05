<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    // Registrasikan dalam application
    // Dibuat Property langsung karena tidak memiliki constructor.
    // Jika ada yang butuh UserService akan di handle oleh UserServiceImpl
    public array $singletons = [
        UserService::class => UserServiceImpl::class,
    ];

    // Wajib Override Function dari Implements DefferebaleProvider
    public function provides(): array
    {   
        return [UserService::class];
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
