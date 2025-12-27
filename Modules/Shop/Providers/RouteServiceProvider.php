<?php

namespace Modules\Shop\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Shop';
    protected $namespace = 'Modules\Shop\Http\Controllers';
    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
    }
    protected function mapAdminRoutes(): void
    {
        Route::prefix('admin/shop')
            ->middleware(['web', 'auth', 'admin.auth'])
            ->namespace($this->namespace)
            ->name('shop.admin.')
            ->group(base_path('Modules/Shop/routes/admin.php'));
    }
    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        //$this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(base_path('Modules/Shop/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::middleware('api')->prefix('api')->name('api.')->group(module_path($this->name, '/routes/api.php'));
    }
}
