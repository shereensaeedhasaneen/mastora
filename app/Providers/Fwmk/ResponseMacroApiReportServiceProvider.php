<?php

namespace App\Providers\Fwmk;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroApiReportServiceProvider extends ServiceProvider
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
        $apiReport = function (
            int  $code,
            string $message,
            ?string  $errors,
        ) {
            $response = [
                'status' => [
                    'code' => $code,
                    'message' => $message,
                    'errors' => $errors
                ], 'data' => null
            ];

            return Response::make($response, $code);
        };

        Response::macro('apiReport', $apiReport);
    }
}
