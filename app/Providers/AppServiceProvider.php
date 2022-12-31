<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResourceCollection::withoutWrapping();
        JsonResource::withoutWrapping();

        Response::macro('success', function ($data) {
            return response()->json($data, 200);
        });

        Response::macro('error', function ($message, $status = 400) {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $status);
        });

        $this->loadMigrationsFrom(glob(base_path('/app/Modules/*/Database/*')));
    }
}