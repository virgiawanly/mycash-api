<?php

namespace App\Http\Controllers\WebApp\Business;

use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Business\CreateBusinessLocationRequest;
use App\Http\Requests\WebApp\Business\UpdateBusinessLocationRequest;
use App\Services\Business\BusinessLocationService;

class BusinessLocationController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected BusinessLocationService $businessLocationService)
    {
        parent::__construct($businessLocationService->repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Business\CreateBusinessLocationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateBusinessLocationRequest $request)
    {
        return parent::save($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Business\UpdateBusinessLocationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBusinessLocationRequest $request, int $id)
    {
        return parent::patch($request, $id);
    }
}
