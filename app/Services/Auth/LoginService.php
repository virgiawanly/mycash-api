<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class LoginService
{
    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\Interfaces\UserRepositoryInterface $userRepository
     * @return void
     */
    public function __construct(protected UserRepositoryInterface $userRepository) {}

    /**
     * Login user by creating an access token.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function login(array $data)
    {
        $user = $this->userRepository->findUserByEmail($data['email']);

        if (empty($user) || !Hash::check($data['password'], $user->password)) {
            throw new UnauthorizedException('Invalid email or password.');
        }

        return [
            'user' => $user,
            'token' => $user->createToken('webAppToken')->plainTextToken
        ];
    }
}
