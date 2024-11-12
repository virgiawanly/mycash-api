<?php

namespace App\Repositories;

use App\Models\ChartOfAccount;
use App\Repositories\Interfaces\ChartOfAccountRepositoryInterface;

class ChartOfAccountRepository extends BaseResourceRepository implements ChartOfAccountRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new ChartOfAccount();
    }
}
