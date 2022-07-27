<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //Passport routes
        Passport::routes(); 
        
        /* Passport::tokensExpireIn(now()->addMinutes(30)); //Token expires after 30 minutes
        Passport::refreshTokensExpireIn(now()->addDays(30)); //Refresh tokens expires after 30 days
        Passport::personalAccessTokensExpireIn(now()->addMonths(2)); //Personal token expires after 2 months */
    }
}
