<?php

use App\Http\Controllers\Api\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CostController;
use App\Http\Controllers\Api\IllnessController;
use App\Http\Controllers\Api\RelativeController;
use App\Http\Controllers\Api\SocialResearchController;
use App\Http\Controllers\ApiV2;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    ['prefix' => 'auth', 'namespace' => 'Auth'],
    function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('login-partner', [AuthController::class, 'loginPartner']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        Route::post('login-with-token', [AuthController::class, 'loginWithToken']);
        Route::post('register', [RegisterController::class, 'register']);
    }
);

Route::get('loan/{loan}', [LoanController::class, 'show']);
Route::get('loans', [LoanController::class, 'index']);
Route::post('loan/store/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6InNoaXQgYTdlaCIsImFkbWluIjp0cnVlLCJpYXQiOjE2MzYyNTU3NDIsImV4cCI6MTYzNjI1OTM0Mn0obPDXlIyNs1_QT8gyn2gs1BAetKGzzQJRf9mU7i7s', [LoanController::class, 'store']);

Route::post('relative/store/{loan}', [RelativeController::class, 'store']);

Route::post('cost/store/{loan}', [CostController::class, 'store']);

Route::post('illness/store/{loan}', [IllnessController::class, 'store']);

Route::post('social-research/store/{loan}', [SocialResearchController::class, 'store']);

Route::post('field-inquiry/store/{loan}', [LoanController::class, 'storeFieldInquiry']);

Route::group(
    ['prefix' => 'v2', 'namespace' => 'v2'],
    function ($router) {
        Route::get('loan/{loan}', [ApiV2\LoanController::class, 'show']);
        Route::get('loans', [ApiV2\LoanController::class, 'index']);
    
        Route::post('relative/store/{loan}', [ApiV2\RelativeController::class, 'store']);
        
        Route::post('cost/store/{loan}', [ApiV2\CostController::class, 'store']);
        
        Route::post('illness/store/{loan}', [ApiV2\IllnessController::class, 'store']);
        
        Route::post('social-research/store/{loan}', [ApiV2\SocialResearchController::class, 'store']);
        
        Route::post('field-inquiry/store/{loan}', [ApiV2\FieldInquiryController::class, 'store']);
        
    }
);