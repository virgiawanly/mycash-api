<?php

namespace App\Http\Controllers\WebApp\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebApp\Auth\LoginRequest;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected LoginService $loginService) {}

    /**
     * Login a user by creating an access token.
     * 
     * @param  \App\Http\Requests\WebApp\Auth\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $results = $this->loginService->login($request->validated());

        return ResponseHelper::success(trans('messages.successfully_logged_in'), $results, 200);
    }
}
