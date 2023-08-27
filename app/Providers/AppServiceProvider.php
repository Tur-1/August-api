<?php

namespace App\Providers;

use App\Modules\Users\Repository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

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

        Response::macro('error', function ($message, $data, $status = 404) {
            return response()->json([
                'message' => $message,
                'data' => $data,
                'success' => false,
            ], $status);
        });

        $this->loadMigrationsFrom(glob(base_path('/app/Modules/*/Database/*')));
    }
}
