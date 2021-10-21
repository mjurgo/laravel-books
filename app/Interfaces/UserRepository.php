<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepository
{
    public function updateModel(User $user, array $data): void;
}
