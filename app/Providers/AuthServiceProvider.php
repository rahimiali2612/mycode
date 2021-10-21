<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Interfaces\AuthInterface;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //
    }

    public function register()
    {
        $this->app->bind(
            AuthInterface::class,
            AuthRepository::class
        );
    }
}
