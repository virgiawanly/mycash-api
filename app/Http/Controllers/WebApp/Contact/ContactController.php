<?php

namespace App\Http\Controllers\WebApp\Contact;

use App\Http\Controllers\BaseResourceController;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use App\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ContactService $contactServContactService)
    {
        parent::__construct($contactServContactService->repository);
    }
}
