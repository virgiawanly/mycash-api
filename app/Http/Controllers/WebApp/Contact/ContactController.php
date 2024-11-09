<?php

namespace App\Http\Controllers\WebApp\Contact;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Contact\CreateContactRequest;
use App\Http\Requests\WebApp\Contact\UpdateContactRequest;
use App\Services\Contact\ContactService;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ContactService $contactService)
    {
        parent::__construct($contactService->repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Contact\CreateContactRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateContactRequest $request)
    {
        try {
            DB::beginTransaction();

            $result = $this->contactService->save($request->validated());

            DB::commit();
            return ResponseHelper::success(trans('messages.successfully_created'), $result, 201);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $result = $this->contactService->find($id, ['contactGroup']);

        return ResponseHelper::data($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Contact\UpdateContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateContactRequest $request, int $id)
    {
        try {
            DB::beginTransaction();

            $result = $this->contactService->patch($id, $request->validated());

            DB::commit();
            return ResponseHelper::success(trans('messages.successfully_updated'), $result, 200);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
