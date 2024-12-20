<?php

namespace App\Http\Controllers\WebApp\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebApp\Auth\RegistrationRequest;
use App\Services\Auth\RegistrationService;
use Exception;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected RegistrationService $registrationService) {}

    /**
     * Register a new user.
     *
     * @param  \App\Http\Requests\WebApp\Auth\RegistrationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationRequest $request)
    {
        try {
            DB::beginTransaction();

            // Register the user and its business
            $results = $this->registrationService->register($request->validated());

            DB::commit();
            return ResponseHelper::success(trans('messages.successfully_registered'), $results, 201);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
