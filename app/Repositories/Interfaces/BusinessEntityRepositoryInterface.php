<?php

namespace App\Repositories\Interfaces;

interface BusinessEntityRepositoryInterface extends BaseResourceRepositoryInterface
{
    /**
     * Batch delete resources by ids.
     *
     * @param  array $ids
     * @return bool
     */
    public function batchDeleteByIds(array $ids): bool;
}
