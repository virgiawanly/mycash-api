<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactRepository extends BaseResourceRepository implements ContactRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Contact();
    }

    /**
     * Get default contact code latest counter.
     *
     * @return int
     */
    public function getDefaultContactCodeLatestCounter(): int
    {
        $latestCode = $this->model
            ->fromUserBusiness()
            ->where('code', 'like', 'C-%')
            ->orderBy('code', 'desc')
            ->first();

        if ($latestCode) {
            $latestCode = intval(str_replace('C-', '', $latestCode->code)) + 1;
        } else {
            $latestCode = 1;
        }

        return $latestCode;
    }
}
