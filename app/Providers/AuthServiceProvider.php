<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
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

        // 1 = mahasiswa 2 = kantin 3 = admin
        Gate::define('mahasiswa', function(User $user) : bool{
            return $user->status_user == 1;
        });
        Gate::define('kantin', function(User $user) : bool{
            return $user->status_user == 2;
        });
    }
}
