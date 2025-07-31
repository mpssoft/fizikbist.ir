<?php

namespace App\Providers;

use App\Notifications\Channels\RayganSmsChannel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->usePublicPath(__DIR__."/../../public_html");
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Notification::extend('sms', function ($app) {
            return new RayganSmsChannel();
        });
    }
}
