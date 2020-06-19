<?php

namespace App\Providers;

use App\Auth\AuthUser;
use App\Auth\AuthUserProvider;
use App\Auth\Implement\EloquentAuthUserReository;
use App\Auth\Implement\GuestAuthUserRepository;
use App\Auth\Implement\HiworksAuthUserRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $container = app();

        //requestVia should be implied

        switch (request()->header('AUTH_TYPE')) {
            case 'hiworks':
                $repository = new HiworksAuthUserRepository();
                break;
            case 'eloquent':
                $repository = $container->make(EloquentAuthUserReository::class);
                break;
            default:
                $repository = $container->make(EloquentAuthUserReository::class);
                break;
        }

        Auth::provider('auth', function ($app, array $config) use ($repository) {
            return new AuthUserProvider($repository);
        });

    }
}
