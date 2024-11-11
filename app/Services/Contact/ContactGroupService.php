<?php

namespace App\Services\Contact;

use App\Repositories\Interfaces\ContactGroupRepositoryInterface;
use App\Services\BaseResourceService;

class ContactGroupService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param  \App\Repositories\Interfaces\ContactGroupRepositoryInterface  $repository
     * @return void
     */
    public function __construct(ContactGroupRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
