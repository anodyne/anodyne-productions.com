<?php

namespace App\Account\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'username' => [
                'required',
                'alpha_dash',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'bio' => ['nullable'],
            'twitter' => ['nullable'],
            'facebook' => ['nullable', 'url'],
            'google' => ['nullable'],
            'discord' => ['nullable'],
            'url' => ['nullable', 'url'],
        ];
    }
}
