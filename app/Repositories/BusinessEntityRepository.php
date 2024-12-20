<?php

namespace App\Repositories;

use App\Models\BusinessEntity;
use App\Repositories\Interfaces\BusinessEntityRepositoryInterface;

class BusinessEntityRepository extends BaseResourceRepository implements BusinessEntityRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new BusinessEntity();
    }
}
