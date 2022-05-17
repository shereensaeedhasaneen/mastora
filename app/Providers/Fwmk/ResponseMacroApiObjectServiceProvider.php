<?php

namespace App\Providers\Fwmk;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroApiObjectServiceProvider extends ServiceProvider
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
        $apiObject = function (
            int  $code,
            string $message,
            ?string  $errors,
            JsonResource $data
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

        Response::macro('apiObject', $apiObject);
    }
}
