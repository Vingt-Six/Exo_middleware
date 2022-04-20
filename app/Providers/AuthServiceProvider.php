<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('redac-delete', function($user, $article){
            return $user->role_id == 5 && $user->id == $article->user_id || $user->role_id != 5; 
        });

        Gate::define('user-admin', function($user, $item){
            return $user->role_id == 1 && $item->role_id != 1 || $user->role_id == 4 && $item->role_id != 4 && $item->role_id != 1;
        });

        Gate::define('role-hide', function($user, $role){
            return $user->role_id == 4 && $role->id != 4 && $role->id != 1 || $user->role_id == 1;
        });
    }
}
