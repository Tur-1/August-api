<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {


            Route::middleware('api')->prefix('api')
                ->group(base_path('routes/AuthUserRoutes.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(function ($route) {
                    foreach (glob(base_path('routes/Frontend/*.php')) as $fileName) {
                        require $fileName;
                    }
                });



            Route::middleware('api')
                ->prefix('api/admin')
                ->group(base_path('routes/AuthAdminRoutes.php'));


            Route::prefix('api/admin')
                ->middleware(['admin_domain', 'api', 'auth:admin'])
                ->group(function ($route) {
                    foreach (glob(base_path('routes\\Admin\\*.php')) as $fileName) {
                        require $fileName;
                    }
                });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}