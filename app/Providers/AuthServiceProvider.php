<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
        Gate::define('add_artice', function (User $user) {
            foreach ($user->roles as $role) {
                if($role->name === 'admin'){
                    return true;
                }
            }
            return $false;
        });

        Gate::define('update-article', function(User $user, $post) {
            foreach ($user->roles as $role) {
                if($role->name === 'admin'){
                    if($user->id === $post->user_id) {
                        return true;
                    }
                }
            }
            return false;
        });
        */
    }
}
