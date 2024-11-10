<?php

namespace App\Http\Controllers\WebApp\Business;

use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Business\CreateBusinessEntityRequest;
use App\Http\Requests\WebApp\Business\UpdateBusinessEntityRequest;
use App\Services\Business\BusinessEntityService;

class BusinessEntityController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected BusinessEntityService $businessEntityService)
    {
        parent::__construct($businessEntityService->repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Business\CreateBusinessEntityRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateBusinessEntityRequest $request)
    {
        return parent::save($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Business\UpdateBusinessEntityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBusinessEntityRequest $request, int $id)
    {
        return parent::patch($request, $id);
    }
}
