<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        $data = $request->validated();

        if (!empty($data['avatar']))
        {
            $path = $data['avatar']->store('avatars', 'public');

            if ($path)
            {
                Storage::disk('public')->delete($user->avatar);
                $data['avatar'] = $path;
            }
        }

        $this->userRepository->updateModel(
            Auth::user(), $data);

        return redirect(route('me.profile'))
            ->with('message', 'Profil zaktualizowany.');
    }
}
