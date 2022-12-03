<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Business;
use App\Models\CustomPage;
use App\Models\Employee;
use App\Models\Post;
use App\Models\User;
use App\Policies\BusinessPolicy;
use App\Policies\CustomPagePolicy;
use App\Policies\EmployeePolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class,
        CustomPage::class => CustomPagePolicy::class,
        Post::class, PostPolicy::class,
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
