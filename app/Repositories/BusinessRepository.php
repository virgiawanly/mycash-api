<?php

namespace App\Repositories;

use App\Models\Business;
use App\Repositories\Interfaces\BusinessRepositoryInterface;

class BusinessRepository extends BaseResourceRepository implements BusinessRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Business();
    }
}
