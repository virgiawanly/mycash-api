<?php

namespace App\Services\Business;

use App\Repositories\Interfaces\BusinessEntityRepositoryInterface;
use App\Services\BaseResourceService;

class BusinessEntityService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param  \App\Repositories\Interfaces\BusinessEntityRepositoryInterface  $repository
     * @return void
     */
    public function __construct(BusinessEntityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository instance.
     *
     * @return \App\Repositories\Interfaces\BusinessEntityRepositoryInterface
     */
    public function repository(): BusinessEntityRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * Batch delete resources.
     *
     * @param  array $payload
     * @return void
     */
    public function batchDelete(array $payload)
    {
        $this->repository()->batchDeleteByIds($payload['ids']);
    }
}
