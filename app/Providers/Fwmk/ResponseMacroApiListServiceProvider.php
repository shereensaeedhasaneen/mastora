<?php

namespace App\Providers\Fwmk;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroApiListServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $apiList = function (
            int  $code,
            string $message,
            ?string  $errors,
            AnonymousResourceCollection  $data
        ) {
            $response = [
                'status' => [
                    'code' => $code,
                    'message' => $message,
                    'errors' => $errors
                ], 'data' => $data
            ];

            return Response::make($response, $code);
        };

        Response::macro('apiList', $apiList);
    }
}
