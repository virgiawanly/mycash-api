<?php

namespace App\Repositories;

use App\Models\ContactGroup;
use App\Repositories\Interfaces\ContactGroupRepositoryInterface;

class ContactGroupRepository extends BaseResourceRepository implements ContactGroupRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new ContactGroup();
    }
}
