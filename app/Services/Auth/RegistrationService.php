<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class RegistrationService
{
    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\Interfaces\BusinessRepositoryInterface $businessRepository
     * @param \App\Repositories\Interfaces\UserRepositoryInterface $userRepository
     * @return void
     */
    public function __construct(
        protected BusinessRepositoryInterface $businessRepository,
        protected UserRepositoryInterface $userRepository
    ) {}

    /**
     * Register a new user and its business.
     *
     * @param  array $data
     * @return array
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

        return [
            'user' => $user,
            'token' => $user->createToken('webAppToken')->plainTextToken
        ];
    }
}
