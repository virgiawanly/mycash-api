<?php

namespace App\Repositories\Interfaces;

interface ContactRepositoryInterface extends BaseResourceRepositoryInterface
{
    /**
     * Get default contact code latest counter.
     *
     * @return int
     */
    public function getDefaultContactCodeLatestCounter(): int;
}
