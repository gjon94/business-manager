<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Business;
use App\Models\CustomTables;
use App\Policies\BusinessPolicy;
use App\Policies\CustomTables as PoliciesCustomTables;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Business::class => BusinessPolicy::class,
        CustomTables::class => PoliciesCustomTables::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
