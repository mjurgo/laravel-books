<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = Auth::id();
        return [
            'email' => [
                'required',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            'name' => [
                'required',
                'max:50',
                new AlphaSpaces()
            ],
            'avatar' => [
                'nullable',
                'file',
                'image'
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email musi być unikalny.',
            'name.max' => 'Nazwa nie może przekraczać :max znaków.'
        ];
    }
}
