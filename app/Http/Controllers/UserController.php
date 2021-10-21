<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        return view('me.profile', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('me.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $this->userRepository->updateModel(
            Auth::user(), $request->validated());

        return redirect(route('me.profile'))
            ->with('status', 'Profil zaktualizowany.');
    }
}
