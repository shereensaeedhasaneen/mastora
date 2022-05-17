<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserLoginFromApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Response;

class RegisterController extends Controller
{

    /**
     * User Service
     *
     * @var \App\Services\UserService 
     */
    protected $service;

    /**
     * User constructor.
     *
     * @param \App\Services\UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Register new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): Response
    {
        $userData = $request->all();
        $validator = $this->validator($userData);
        $errors = $validator->errors();

        if (!$validator->failed()) {
            $userData['active'] = false;
            $user = $this->service->makeResourceApiBased($userData);

            $user->access_token = auth('api')->login($user);

            //TODO: Need to verify user email.

            UserLoginFromApi::dispatch($user, request());
            return response()->apiObject(201, 'User Created Successfully.', null, new UserResource($user));
        }

        return response()->apiReport(400, 'The data entered is invalid.', $errors->first());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): ValidationValidator
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validator = Validator::make($data, $rules);
        return $validator;
    }
}
