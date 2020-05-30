<?php

namespace App\Support\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ];
    }
}
