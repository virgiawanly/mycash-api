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
}
