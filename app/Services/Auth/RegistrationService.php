<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class RegistrationService
{
    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(
        protected BusinessRepositoryInterface $businessRepository,
        protected UserRepositoryInterface $userRepository
    ) {}

    /**
     * Register a new user and its business.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function register(array $data)
    {
        // Create a new user data
        $user = $this->userRepository->save([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

        // Create a new business data
        $business = $this->businessRepository->save([
            'owner_id' => $user->id,
            'name' => $data['business_name'],
        ]);

        // Update user's business
        $user->update(['business_id' => $business->id]);

        return $user;
    }
}
