<?php

namespace App\Repositories;

use App\Models\BusinessLocation;
use App\Repositories\Interfaces\BusinessLocationRepositoryInterface;

class BusinessLocationRepository extends BaseResourceRepository implements BusinessLocationRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new BusinessLocation();
    }
}
