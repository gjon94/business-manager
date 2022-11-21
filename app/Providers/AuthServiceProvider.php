<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Business;
use App\Models\CustomPage;
use App\Models\Employee;

use App\Policies\BusinessPolicy;
use App\Policies\CustomPagePolicy;
use App\Policies\EmployeePolicy;

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
        Employee::class => EmployeePolicy::class,
        CustomPage::class => CustomPagePolicy::class,
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
