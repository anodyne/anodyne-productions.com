<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'username' => ['required', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
        ];
    }
}
