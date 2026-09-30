<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        'App\Models\User'       => 'App\Policies\UserPolicy',
        'App\Models\Setting'    => 'App\Policies\SettingPolicy',
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::Resource('User', 'App\Policies\UserPolicy');
    }
}
