<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function(User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('admin', function (User $user) {
            if($user->role === 'admin') {
                return true;
            }
            return false;
        });

    }
}
