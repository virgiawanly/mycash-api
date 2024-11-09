<?php

namespace App\Http\Controllers\WebApp\Contact;

use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\WebApp\Contact\CreateContactGroupRequest;
use App\Http\Requests\WebApp\Contact\UpdateContactGroupRequest;
use App\Services\Contact\ContactGroupService;

class ContactGroupController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ContactGroupService $contactGroupService)
    {
        parent::__construct($contactGroupService->repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Contact\CreateContactGroupRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateContactGroupRequest $request)
    {
        return parent::save($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WebApp\Contact\UpdateContactGroupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateContactGroupRequest $request, int $id)
    {
        return parent::patch($request, $id);
    }
}
