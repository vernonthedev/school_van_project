<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;

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
    public function boot()
    {
        //making sure we access our application using tokens
        Sanctum::authenticateAccessTokensUsing(function (PersonalAccessToken $token, $isValid) {
            return $isValid && !$this->isExpired($token);
        });

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }

    protected function isExpired($token)
    {
        $expiration = config('sanctum.expiration');
        return $expiration ? $token->created_at->lte(now()->subMinutes($expiration)) : false;
    }
}
