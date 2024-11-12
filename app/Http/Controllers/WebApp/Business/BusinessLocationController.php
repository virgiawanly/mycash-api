<?php

namespace App\Http\Controllers\WebApp\Business;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Business\BatchDeleteBusinessLocationRequest;
use App\Http\Requests\WebApp\Business\CreateBusinessLocationRequest;
use App\Http\Requests\WebApp\Business\UpdateBusinessLocationRequest;
use App\Services\Business\BusinessLocationService;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Set default result as paginated list
        $result = $request->has('paginate') && ($request->paginate === 'false' || $request->paginate === '0')
            ? $this->service->list($request->all(), ['businessEntity'])
            : $this->service->paginatedList($request->all(), ['businessEntity']);

        return ResponseHelper::data($result);
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Business\BatchDeleteBusinessLocationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function batchDelete(BatchDeleteBusinessLocationRequest $request)
    {
        $this->businessLocationService->batchDelete($request->validated());

        return ResponseHelper::success(trans('messages.successfully_deleted'));
    }
}
