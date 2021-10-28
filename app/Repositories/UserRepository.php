<?php

namespace App\Repositories;

use App\Interfaces\UserRepository as UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function updateModel(User $user, array $data): void
    {
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->avatar = $data['avatar'] ?? null;

        $user->save();
    }
}
