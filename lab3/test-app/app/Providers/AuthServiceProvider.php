<?php

namespace App\Providers;

use App\Models\Abonent;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('viewAny-resource', function ($user) {
            return true;
        });

        Gate::define('create-resource', function ($user) {
            return true;
        });

        Gate::define('edit-abonent', function (User $user, $abonent) {
            if($user->role === "editor"||$user->role === "superadmin") return true;
            return $user->id === $abonent->creator_user_id;
        });

        Gate::define('delete-abonent', function (User $user, $abonent) {
            if($user->role === "superadmin") return true;
            return $user->id === $abonent->creator_user_id;
        });
    }
}
