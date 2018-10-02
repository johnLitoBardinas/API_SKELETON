<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 3:05 PM 10-1-2018
        Passport::routes();

        // 3:12 PM 10-1-2018
        Passport::tokensExpireIn(now()->addDays(1));

        // 3:13 PM 10-1-2018
        Passport::refreshTokensExpireIn(now()->addDays(2));
    }
}
