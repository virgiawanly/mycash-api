<?php

namespace App\Services\Contact;

use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Services\BaseResourceService;

class ContactService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param  \App\Repositories\Interfaces\ContactRepositoryInterface  $repository
     * @return void
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository instance.
     *
     * @return \App\Repositories\Interfaces\ContactRepositoryInterface
     */
    public function repository(): ContactRepositoryInterface
    {
        return $this->repository;
    }
}
