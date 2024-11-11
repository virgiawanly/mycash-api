<?php

namespace App\Services\Contact;

use App\Enums\ContactType;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Services\BaseResourceService;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Generate contact code.
     *
     * @return string
     */
    public static function generateContactCode(string $prefix = 'C-'): string
    {
        $repository = app()->make(ContactRepositoryInterface::class);

        $counter = $repository->getDefaultContactCodeLatestCounter();

        return $prefix . str_pad($counter, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Create a new resource.
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(array $payload): Model
    {
        if (empty($payload['code'])) {
            $payload['code'] = self::generateContactCode();
        }

        if ($payload['type'] == ContactType::Business->value) {
            $payload['individual_name'] = null;
            $payload['individual_title'] = null;
        } else if ($payload['type'] == ContactType::Individual->value) {
            $payload['business_name'] = null;
        }

        return $this->repository->save($payload);
    }

    /**
     * Update a resource.
     *
     * @param int $id
     * @param array $payload
     */
    public function patch(int $id, array $payload): Model
    {
        if ($payload['type'] == ContactType::Business->value) {
            $payload['individual_name'] = null;
            $payload['individual_title'] = null;
        } else if ($payload['type'] == ContactType::Individual->value) {
            $payload['business_name'] = null;
        }

        return $this->repository->update($id, $payload);
    }
}
