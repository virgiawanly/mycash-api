<?php

namespace App\Services\ChartOfAccount;

use App\Repositories\Interfaces\ChartOfAccountRepositoryInterface;
use App\Services\BaseResourceService;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccountService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param  \App\Repositories\Interfaces\ChartOfAccountRepositoryInterface  $repository
     * @return void
     */
    public function __construct(ChartOfAccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new resource.
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function saveChartOfAccount(array $payload): Model
    {
        $chartOfAccountPayload = collect($payload)
            ->only(['name', 'code', 'parent_id', 'type', 'is_active'])
            ->toArray();

        $chartOfAccount = $this->repository->save($chartOfAccountPayload);

        $businessEntityIds = $payload['business_entity_ids'] ?? [];
        $mappedBusinessEntityIds = collect($businessEntityIds)->mapWithKeys(function ($id) use ($chartOfAccount) {
            return [$id => ['business_id' => $chartOfAccount->business_id]];
        });

        $chartOfAccount->businessEntities()->sync($mappedBusinessEntityIds);

        return $chartOfAccount;
    }

    /**
     * Update a resource.
     *
     * @param int $id
     * @param array $payload
     */
    public function patchChartOfAccount(int $id, array $payload): Model
    {
        $chartOfAccount = $this->repository->find($id);

        $chartOfAccountPayload = collect($payload)
            ->only(['name', 'code', 'parent_id', 'type', 'is_active'])
            ->toArray();

        $chartOfAccount->update($chartOfAccountPayload);

        $businessEntityIds = $payload['business_entity_ids'] ?? [];
        $mappedBusinessEntityIds = collect($businessEntityIds)->mapWithKeys(function ($id) use ($chartOfAccount) {
            return [$id => ['business_id' => $chartOfAccount->business_id]];
        });

        $chartOfAccount->businessEntities()->sync($mappedBusinessEntityIds);

        return $chartOfAccount;
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
