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


            // frontend routes
            Route::middleware(['api_browser_restriction', 'api'])->group(base_path('routes/Auth/UserRoutes.php'));

            Route::middleware(['api_browser_restriction', 'api'])->group(function ($route) {
                foreach (glob(base_path('routes/Frontend/*.php')) as $fileName) {
                    require $fileName;
                }
            });


            // admin routes
            Route::middleware(['api_browser_restriction', 'api'])
                ->prefix('admin')
                ->group(base_path('routes/Auth/AdminRoutes.php'));

            Route::middleware(['api_browser_restriction', 'auth:admin', 'api'])
                ->prefix('admin')
                ->group(function () {
                    foreach (glob(base_path('routes/Admin/*.php')) as $fileName) {
                        require $fileName;
                    }
                });

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
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
