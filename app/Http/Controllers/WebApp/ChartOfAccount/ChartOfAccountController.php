<?php

namespace App\Http\Controllers\WebApp\ChartOfAccount;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Business\BatchDeleteChartOfAccountRequest;
use App\Http\Requests\WebApp\ChartOfAccount\CreateChartOfAccountRequest;
use App\Http\Requests\WebApp\ChartOfAccount\UpdateChartOfAccountRequest;
use App\Services\ChartOfAccount\ChartOfAccountService;
use Illuminate\Http\Request;

class ChartOfAccountController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ChartOfAccountService $chartOfAccountService)
    {
        parent::__construct($chartOfAccountService->repository);
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
            ? $this->service->list($request->all(), ['parent', 'businessEntities:id,code,name'])
            : $this->service->paginatedList($request->all(), ['parent', 'businessEntities:id,code,name']);

        return ResponseHelper::data($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\ChartOfAccount\CreateChartOfAccountRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateChartOfAccountRequest $request)
    {
        return $this->chartOfAccountService->saveChartOfAccount($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\ChartOfAccount\UpdateChartOfAccountRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateChartOfAccountRequest $request, int $id)
    {
        return $this->chartOfAccountService->patchChartOfAccount($id, $request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\ChartOfAccount\BatchDeleteChartOfAccountRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function batchDelete(BatchDeleteChartOfAccountRequest $request)
    {
        $this->chartOfAccountService->batchDelete($request->validated());

        return ResponseHelper::success(trans('messages.successfully_deleted'));
    }
}
