<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserLoginFromApi;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'loginWithToken' , 'loginPartner']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response("invalid", 422);
        }
        $user = auth('api')->user();
        $user->access_token = $token;
        UserLoginFromApi::dispatch($user, request());
        return response()->apiObject(200, 'Login successfully', null, new UserResource($user));
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function loginPartner(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            throw new AuthenticationException('Fail to login, These credentials do not match our records.');
        }
        $user = auth('api')->user();
        $user->access_token = $token;
        UserLoginFromApi::dispatch($user, request());
        $redirect = env('APP_URL') . "login-partner" . "?email=" . Crypt::encryptString($request->email) . "&password=" . Crypt::encryptString($request->password)  ;
        return response([
            "redirect" => $redirect
        ], 200,);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function loginWithToken(Request $request): Response
    {
        $accountToken = $request->input('account_token');
        if (!empty($accountToken)) {
            $results = User::where('account_token', $accountToken)->get();
            if ($results->isNotEmpty()) {
                $user = $results->first();
                $user->access_token = auth('api')->login($user);
                UserLoginFromApi::dispatch($user, request());
                return response()->apiObject(200, 'Login successfully', null, new UserResource($user));
            }
        }
        throw new AuthenticationException('Invalid account token.');
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\Response
     */
    public function me(): Response
    {
        return response()->apiObject(200, 'Authenticated User', null, new UserResource(auth('api')->user()));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(): Response
    {
        auth('api')->logout();
        return response()->apiReport(200, 'Successfully logged out', null);
    }

    /**
     * Refresh a token. 
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function refresh(): Response
    {
        $user = auth('api')->user();
        if (isset($user)) {
            $user->access_token = auth('api')->refresh();
            return response()->apiObject(200, 'Token refreshed successfully', null, new UserResource($user));
        }
        throw  new AuthenticationException();
    }
}
