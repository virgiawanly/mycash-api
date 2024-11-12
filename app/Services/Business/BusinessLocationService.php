<?php

namespace App\Services\Business;

use App\Repositories\Interfaces\BusinessLocationRepositoryInterface;
use App\Services\BaseResourceService;

class BusinessLocationService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param  \App\Repositories\Interfaces\BusinessLocationRepositoryInterface  $repository
     * @return void
     */
    public function __construct(BusinessLocationRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
